<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\CuocPhiVanCHuyen;
use App\DiaChiGiaoHang;
use App\DonHang;
use App\EmailNhanTinKhuyenMai;
use App\HanhVi;
use App\HinhAnhSanPham;
use App\LoaiThanhToan;
use App\MauSac;
use App\PhieuGiamGia;
use App\PhieuGiaoHang;
use App\PhuongXa;
use App\QuanHuyen;
use App\SanPham;
use App\ThanhPho;
use App\TinhTrangDonHang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use App\KhachHang;
use App\NguoiDung;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{

//--------------------ĐĂNG XUẤT-----------------------------------------------------------------------------------------
    //Trang đăng xuất của khách hàng
    public function getLogoutUser(){
        if(Auth::check()){
            Auth::logout();
            return redirect()->back();
        }
    }

//--------------------ĐĂNG KÝ-------------------------------------------------------------------------------------------
    //Trang đăng ký của khách hàng
    public function getRegisterUser(){
        session(['backURL' => URL::previous()]);
        return view('users.register');
    }
    //Xử lý khi gửi yêu cầu đăng ký
    public function postRegisterUser(Request $request){
        //Qui định luật lệ khi đăng ký
        $rules = [
            'txtUserNameRG'                 => 'required',
            'txtUserPhoneRG'                => 'required|min:10|max:11',
            'sexRG'                         => 'required|max:3',
            'txtUserAccountRG'              => 'required|email',
            'txtUserPassRG'                 => 'required|min:6',
            'txtUserPassConfirmRG'          => 'required'
        ];
        //Nội dung xuất ra khi vi phạm luật
        $message = [
            'txtUserNameRG.required'        => 'Tên người dùng không được bỏ trống..',

            'txtUserPhoneRG.required'       => 'Số điện thoại không được bỏ trống..',
            'txtUserPhoneRG.min'            => 'Số điện thoại không hợp lệ..',
            'txtUserPhoneRG.max'            => 'Số điện thoại không hợp lệ..',

            'sexRG.required'                => 'Giới tính không được bỏ trống..',
            'sexRG.max'                     => 'Vui lòng chọn giới tính',

            'txtUserAccountRG.required'     => 'Email không được bỏ trống..',
            'txtUserAccountRG.email'        => 'Định dạng email không hợp lệ..',

            'txtUserPassRG.required'        => 'Mật khấu không được bỏ trống..',
            'txtUserPassRG.min'             => 'Độ dài mật khẩu ít nhất là 6 ký tự..',

            'txtUserPassConfirmRG.required' => 'Mật khấu xác nhận không được bỏ trống..'
        ];

        //Biến để xác thực là có vi phạm hay không
        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            //Thông tin khách hàng
            $name = $request->input('txtUserNameRG');
            $email = $request->input('txtUserAccountRG');
            $pass = $request->input('txtUserPassRG');
            $passConfirm = $request->input('txtUserPassConfirmRG');
            $sex = $request->input('sexRG');
            $phone = $request->input('txtUserPhoneRG');
            $day = $request->input('dayRG');
            $month = $request->input('monthRG');
            $year = $request->input('yearRG');
            $DoB = $day.'/'.$month.'/'.$year;

            //Có đăng ký nhận tin khuyến mãi hay không
            $accept = $request->has('cbAccept')? true: false;

            //Kiểm tra email đã tồn tại hay chưa
            $checkAccount = NguoiDung::where('email', $email)->count();
            $checkCustomer= KhachHang::where('kh_email', $email)->count();
            if($checkAccount > 0 || $checkCustomer > 0){
                return redirect()->back()->with('existEmail', 'Email này đã tồn tại..');
            }else{
                //Kiểm tra mật khẩu xác nhận
                if($passConfirm != $pass){
                    return redirect()->back()->with('wrongPass', 'Mật khẩu xác nhận không chính xác..');
                }else {
                    //Thêm vào bảng Người Dùng
                    $user = new NguoiDung();
                    $user->nd_lnd_id = 2;  //2 là khách hàng
                    $user->name = $name;
                    $user->email = $email;
                    $user->password = bcrypt($pass);
                    $user->created_at = Carbon::now();
                    $user->updated_at = Carbon::now();
                    $user->save();

                    //Thêm vào bảng Khách Hàng
                    $customer = new KhachHang();
                    $customer->kh_ten = $name;
                    $customer->kh_ngay_sinh = $DoB;
                    $customer->kh_gioi_tinh = $sex;
                    $customer->kh_sdt = $phone;
                    $customer->kh_email = $email;
                    $customer->created_at = Carbon::now('Asia/Ho_Chi_Minh');
                    $customer->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
                    $customer->save();

                    //Kiểm tra khách hàng có muốn nhận tin khuyến mãi hay không
                    if($accept){
                        $addEmail = new EmailNhanTinKhuyenMai();
                        $addEmail->email = $email;
                        $addEmail->save();
                    }

                    //Login vào trang chủ
                    if(Auth::attempt(['email' => $email, 'password' => $pass])){
                        return redirect(session('backURL'));
                    }
                }
            }
        }
    }

//--------------------ĐĂNG NHẬP-----------------------------------------------------------------------------------------
    //Trang đăng nhập của khách hàng
    public function getLoginUser(){
        session(['backURL' => URL::previous()]);
        return view('users.login');
    }
    //Xử lý khi gửi yêu cầu đăng nhập
    public function postLoginUser(Request $request){
        //Qui định luật lệ khi đăng nhập
        $rules = [
            'txtUserEmail'          => 'required|email',
            'txtUserPass'           => 'required|min:6'
        ];
        //Nội dung xuất ra khi vi phạm luật
        $message = [
            'txtUserEmail.required' => 'Email không được bỏ trống..',
            'txtUserEmail.email'    => 'Định dạng email không hợp lệ..',
            'txtUserPass.required'  => 'Mật khẩu không được bỏ trống..',
            'txtUserPass.min'       => 'Độ dài mật khẩu ít nhất là 6 ký tự..'
        ];

        //Biến để xác thực là có vi phạm hay không
        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $data = [
                'email'             => $request->input('txtUserEmail'),
                'password'          => $request->input('txtUserPass')
            ];

            //Kiểm tra có check "Duy trì đăng nhập" hay ko nếu có là true
            $remember = $request->has('cbRemember')? true: false;

            if (Auth::attempt($data, $remember)) {
                return redirect(session('backURL'));
            } else {
                $errors = new MessageBag(["errorLoginUser" => "Tên tài khoản hoặc mật khẩu không chính xác"]);
                return redirect()->back()->withErrors($errors);
            }

        }
    }

//--------------------THAY ĐỔI MẬT KHẨU---------------------------------------------------------------------------------
    public function getChangePasswordUser($id){
        $nguoidung = NguoiDung::find($id);
        return view('users.thay-doi-mat-khau',['nguoidung'=> $nguoidung]);
    }
    public function postChangePasswordUser(Request $request,$id){
        //Qui định luật lệ khi đăng ký
        $nguoidung = NguoiDung::find($id);
        $this->validate($request,[
            'password'                    =>'required',
            'ConfirmPassword'             =>'required',
        ],
            [
                'password.required'       =>'Bạn chưa nhập mật khẩu',
                'ConfirmPassword.required'=>'Bạn chưa xác nhận lại mật khẩu',
            ]);
        $pass = $request->input('password');
        $passConfirm = $request->input('ConfirmPassword');
        if($pass != $passConfirm)
        {
            return redirect()->back()->with('thongbao', 'Mật khẩu xác nhận không chính xác..');
        }else {
            $nguoidung->name     = $request->name;
            $nguoidung->email    = $request->email;
            $nguoidung->password = bcrypt($request->password);
            $nguoidung->save();
            return redirect('user/change-password/'.$id)->with('thongbao','Thay đổi mật khẩu thành công');
        }
    }
//--------------------GIỎ HÀNG------------------------------------------------------------------------------------------

    //Trang giỏ hàng của khách hàng
    public function getGioHang()
    {
        //check mail người dùng đã đăng nhập để lấy thông tin khách hàng
        $khachhang = KhachHang::where('kh_email', Auth::user()->email)->first();

        //Lấy toàn bộ sản phẩm của các khách hàng trong giỏ hàng
        $giohang = Cart::content()->toArray();

        //Lọc từng sản phẩm ứng với id của khách hàng trong giỏ
        $total = 0;
        $listCart = array();
        foreach ($giohang as $row){
            if($row['options']['id_KH'] == $khachhang['kh_id']) {
                $listCart[] = $row;
                $total += $row['subtotal'];
            }
        }
        //return view('users.gio-hang',['data' => $listCart, 'total' => $total ]);
        return view('users.gio-hang',['data' => $listCart, 'total' => $total ]);
    }
//--------------------XỬ LÝ GIỎ HÀNG------------------------------------------------------------------------
    //Trả về trang thanh toán hoặc giỏ hàng của khách hàng
    public function postGioHang(Request $request){
        //Xử lý sự cố khi chọn số lượng <= 0
        $rules = [
            'soluong'     => 'min:1'
        ];

        $messages = [
            'soluong.min' => 'Vui lòng nhập đúng số lượng cần mua'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else {

            //Nếu có nhấn nút tăng số lượng bên trang giỏ hàng
            if(isset($request['up'])){

                $id = $request->input('row_id');
                $item = Cart::get($id)->toArray();
                Cart::update($id, $item['qty']+1);
                return redirect()->back();

            }elseif(isset($request['down'])){ //Nếu có nhấn nút giảm số lượng bên trang giỏ hàng

                $id = $request->input('row_id');
                $item = Cart::get($id)->toArray();
                Cart::update($id, $item['qty']-1);
                return redirect()->back();

            }elseif (isset($request['deleteCart'])){ //Nếu có nhấn nút xóa sản phẩm bên trang giỏ hàng

                $id = $request->input('row_id');
                Cart::remove($id);
                return redirect()->back();

            }else{

                $sanpham = SanPham::find($request->input('id_SP'));
                $khachhang = KhachHang::find($request->input('id_KH'));

                $size = $request->input('sizeSelect');
                $soluong = $request->input('soluong');
                $color = $request->input('colorSelect');

                $listHinhAnh = HinhAnhSanPham::where('hasp_sp_id', $sanpham->sp_id)->get()->toArray();
                foreach ($listHinhAnh as $image) {
                    $check = MauSac::where('mau_ha_id', $image['id'])->where('mau_code', $color)->first();
                    if ($check) {
                        $hinhanh = HinhAnhSanPham::find($image['id']);
                        $mau = MauSac::find($check['mau_id']);
                    }
                }

                //Nếu nút [Mua ngay] được nhấn từ trang chi tiết sản phẩm -> chuyển đến trang thanh toán
                if (isset($request['btMuaNgay'])) {

                    //Thêm vào giỏ hàng rồi chuyển sang trang thanh toán để bắt đầu đặt hàng
                    Cart::add($sanpham->sp_id, $sanpham->sp_ten, $soluong, $sanpham->sp_gia_ban,
                        ['size' => $size, 'color' => $mau['mau_ten'], 'img' => $hinhanh->hasp_ten, 'id_KH' => $khachhang->kh_id]);

                    return redirect('user/thanh-toan');
                }

                //Nếu nút [Thêm vào giỏ hàng] được nhấn từ trang chi tiết sản phẩm -> chuyển đến trang giỏ hàng
                if (isset($request['btThemVaoGio'])) {

                    ////Thêm vào giỏ hàng rồi chuyển sang trang trang giỏ hàng.
                    Cart::add($sanpham->sp_id, $sanpham->sp_ten, $soluong, $sanpham->sp_gia_ban,
                        ['size' => $size, 'color' => $mau['mau_ten'], 'img' => $hinhanh->hasp_ten, 'id_KH' => $khachhang->kh_id]);

                    return redirect('user/gio-hang');
                }
            }
        }

    }

//--------------------THANH TOÁN----------------------------------------------------------------------------------------
    //Trang thanh toán của khách hàng
    public function getThanhToan()
    {
        //check mail người dùng đã đăng nhập để lấy thông tin khách hàng
        $khachhang = KhachHang::where('kh_email', Auth::user()->email)->first();

        //Lấy danh sách địa chỉ giao hàng của khách hàng
        $diachi = DiaChiGiaoHang::where('dcgh_kh_id', $khachhang['kh_id'])->get()->toArray();

        //Cước phí vận chuyển và loại thanh toán
        $cuocphi = CuocPhiVanCHuyen::all();
        $thanhtoan = LoaiThanhToan::all();

        //Lấy danh sách thành phố
        $thanhpho = ThanhPho::all();

        //Lấy toàn bộ sản phẩm của các khách hàng trong giỏ hàng
        $giohang = Cart::content()->toArray();

        //Lọc từng sản phẩm ứng với id của khách hàng trong giỏ
        $total = 0;
        $listCart = array();
        foreach ($giohang as $row){
            if($row['options']['id_KH'] == $khachhang['kh_id']) {
                $listCart[] = $row;
                $total += $row['subtotal'];
            }
        }
        //return view('users.gio-hang',['data' => $listCart, 'total' => $total ]);
        return view('users.thanh-toan',['data' => $listCart, 'total' => $total , 'thanhpho' => $thanhpho,
            'khachhang' => $khachhang, 'diachi' => $diachi, 'cuocphivanchuyen' => $cuocphi, 'thanhtoan' => $thanhtoan]);
    }

    public function postThanhToan(Request $request){
        //Nếu có nhấn nút tăng số lượng bên trang thanh toán
        if(isset($request['up'])){

            $id = $request->input('row_id');
            $item = Cart::get($id)->toArray();
            Cart::update($id, $item['qty']+1);
            return redirect()->back();

        }elseif(isset($request['down'])){ //Nếu có nhấn nút giảm số lượng bên trang thanh toán

            $id = $request->input('row_id');
            $item = Cart::get($id)->toArray();
            Cart::update($id, $item['qty']-1);
            return redirect()->back();

        }elseif (isset($request['deleteCart'])){ //Nếu có nhấn nút xóa sản phẩm bên trang thanh toán

            $id = $request->input('row_id');
            Cart::remove($id);
            return redirect()->back();

        }else {
            $rules = [
                'kh_ten'            => 'required',
                'kh_email'          => 'required|email',
                'kh_sdt'            => 'required|numeric',
            ];

            $messages = [
                'kh_ten.required'   => 'Tên khách hàng đang trống',
                'kh_email.required' => 'Email đang trống',
                'kh_email.email'    => 'Email sai định dạng',
                'kh_sdt.required'   => 'Số điện thoại đang trống',
                'kh_sdt.numeric'    => 'Vui lòng nhập đúng số điện thoại',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {

                //Lấy thông tin khách hàng
                $khachhang                   = KhachHang::find($request->input('id_KH'));

                //Nếu nút CẬP NHẬT được nhấn tại trang thanh toán
                if (isset($request['btChinhSua'])) {
                    //Update thông tin khách hàng
                    $khachhang->kh_ten       = $request->kh_ten;
                    $khachhang->kh_email     = $request->kh_email;
                    $khachhang->kh_sdt       = $request->kh_sdt;
                    $khachhang->save();

                    //Nếu khách hàng này chưa có địa chỉ giao hàng
                    if($request->has('checkbox')){
                        $rules1 = [
                            'dcgh_dia_chi'      => 'required',
                            'dcgh_thanh_pho'    => 'required',
                            'dcgh_quan_huyen'   => 'required',
                            'dcgh_phuong_xa'    => 'required',
                        ];
                        $messages1 = [
                            'dcgh_dia_chi.required'      => 'Địa chỉ không được bỏ trống',
                            'dcgh_thanh_pho.required'    => 'Vui lòng chọn thành phố cho địa chỉ muốn thêm',
                            'dcgh_quan_huyen.required'   => 'Vui lòng chọn quận huyện cho địa chỉ muốn thêm',
                            'dcgh_phuong_xa.required'    => 'Vui lòng chọn phường xã cho địa chỉ muốn thêm',
                        ];

                        $validator1 = Validator::make($request->all(), $rules1, $messages1);

                        if ($validator1->fails()) {
                            return redirect()->back()->withErrors($validator1)
                                ->with('status','Cập nhật thông tin thất bại');
                        } else {
                            $diachi = new DiaChiGiaoHang();
                            $diachi->dcgh_kh_id = $khachhang->kh_id;
                            $diachi->dcgh_dia_chi = $request->dcgh_dia_chi;
                            $diachi->dcgh_phuong_xa = $request->dcgh_phuong_xa;
                            $diachi->dcgh_quan_huyen = $request->dcgh_quan_huyen;
                            $diachi->dcgh_thanh_pho = $request->dcgh_thanh_pho;
                            $diachi->save();
                        }
                    }
                    return redirect()->back()->with('status','Cập nhật thông tin thành công');
                }

                //Nếu nút LƯU được nhấn tại trang thanh toán
                if (isset($request['btThemDiaChi'])) {
                    $rules2 = [
                        'dcgh_dia_chi'      => 'required',
                        'dcgh_thanh_pho'    => 'required',
                        'dcgh_quan_huyen'   => 'required',
                        'dcgh_phuong_xa'    => 'required',
                    ];
                    $messages2 = [
                        'dcgh_dia_chi.required'      => 'Địa chỉ không được bỏ trống',
                        'dcgh_thanh_pho.required'    => 'Vui lòng chọn thành phố cho địa chỉ muốn thêm',
                        'dcgh_quan_huyen.required'   => 'Vui lòng chọn quận huyện cho địa chỉ muốn thêm',
                        'dcgh_phuong_xa.required'    => 'Vui lòng chọn phường xã cho địa chỉ muốn thêm',
                    ];

                    $validator2 = Validator::make($request->all(), $rules2, $messages2);

                    if ($validator2->fails()) {
                        return redirect()->back()->withErrors($validator2)->with('status','Thêm địa chỉ thất bại');
                    } else {

                        $diachi                    = new DiaChiGiaoHang();
                        $diachi->dcgh_kh_id        = $khachhang->kh_id;
                        $diachi->dcgh_dia_chi      = $request->dcgh_dia_chi;
                        $diachi->dcgh_phuong_xa    = $request->dcgh_phuong_xa;
                        $diachi->dcgh_quan_huyen   = $request->dcgh_quan_huyen;
                        $diachi->dcgh_thanh_pho    = $request->dcgh_thanh_pho;
                        $diachi->save();
                        return redirect()->back()->with('status', 'Thêm địa chỉ thành công');
                    }
                }

                //Nếu nút [Đặt hàng] được nhấn từ trang thanh toán -> chuyển đến trang đặt hàng thành công
                if (isset($request['btDatHang'])) {
                    if($request->has('payments')) {

                        $tinhtrang                 = TinhTrangDonHang::where('tinh_trang_ten', 'Đang xử lý')->first();
                        $donhang                   = new DonHang();
                        $donhang->dh_kh_id         = $khachhang->kh_id;
                        $donhang->dh_dia_chi_id    = $request->dcgh_id;
                        $donhang->dh_ltt_id        = $request->ltt_id;
                        $donhang->dh_tinh_trang_id = $tinhtrang['tinh_trang_id'];
                        $donhang->dh_cpvc_id       = $request->shipping;
                        $donhang->dh_ngay_dat_hang = Carbon::now();
                        $donhang->created_at    = Carbon::now();
                        $donhang->updated_at    = Carbon::now();


                        if(empty($request->pgg_ten)){
                            $phieu = PhieuGiamGia::where('pgg_ten', 'Không có')->first();
                            $donhang->dh_pgg_id    = $phieu['pgg_id'];
                            $donhang->dh_tong_tien = $request->gia_final;
                            $donhang->save();
                        }else{
                            $phieu = PhieuGiamGia::where('pgg_ten', $request->pgg_ten)->first();
                            if(empty($phieu)){
                                return redirect()->back()->with('status', 'Phiếu giảm giá không tồn tại');
                            }else{
                                $now               = Carbon::now();
                                $start             = Carbon::parse($phieu->ngay_bat_dau);
                                $end               = Carbon::parse($phieu->ngay_ket_thuc);
                                if($now->between($start, $end)){
                                    $total         = $request->gia_final - $phieu->pgg_giam_gia;
                                    $donhang->dh_tong_tien = $total;
                                    $donhang->save();
                                }else{
                                    return redirect()->back()->with('status', 'Phiếu giảm giá đã hết hạn');
                                }
                            }
                        }

                        //Lấy toàn bộ sản phẩm của các khách hàng trong giỏ hàng
                        $giohang = Cart::content()->toArray();
                        //Lọc từng sản phẩm ứng với id của khách hàng trong giỏ
                        $total = 0;
                        $listCart = array();
                        foreach ($giohang as $row) {
                            if ($row['options']['id_KH'] == $khachhang['kh_id']) {
                                $listCart[] = $row;
                                $total += $row['subtotal'];
                            }
                        }
                        foreach ($listCart as $item){
                            $chitiet = new ChiTietDonHang();
                            $chitiet->ctdh_sp_id    = $item['id'];
                            $chitiet->ctdh_dh_id    = $donhang->dh_id;
                            $chitiet->ctdh_so_luong = $item['qty'];
                            $chitiet->ctdh_gia_ban  = $item['price'];
                            $chitiet->ghi_chu       = "Size: ".$item['options']['size'].', màu: '.$item['options']['color'];
                            $chitiet->created_at    = Carbon::now();
                            $chitiet->updated_at    = Carbon::now();
                            $chitiet->save();
                        }
                        // Giới thiệu cho khách hàng những sản phẩm có rating 5 sao
                        return view('success', ['data' => $listCart, 'total' => $donhang->dh_tong_tien]);
                    }else{
                        return redirect()->back()->withErrors(['payments' => "Vui lòng chọn hình thức thanh toán"]);
                    }
                }
            }
        }
    }

//--------------------THÔNG TIN KHÁCH HÀNG------------------------------------------------------------------------------
    public function getInfo(){
        //check mail người dùng đã đăng nhập để lấy thông tin khách hàng
        $khachhang = KhachHang::where('kh_email', Auth::user()->email)->first();
        //Lấy danh sách địa chỉ giao hàng của khách hàng
        $diachi = DiaChiGiaoHang::where('dcgh_kh_id', $khachhang['kh_id'])->get()->toArray();
        return view('users.thong-tin-user',['khachhang' => $khachhang, 'diachi' => $diachi]);
    }

    public function postInfo(Request $request){
        if(isset($request['xoaDiaChi'])){
            $diachi = DiaChiGiaoHang::find($request->id_DCGH);
            $diachi->delete();
            return redirect()->back();
        }else {
            $rules = [
                'txtHoTenTT' => 'required',
                'txtEmailTT' => 'required',
                'txtPhoneTT' => 'required',
            ];
            $messages = [
                'txtHoTenTT.required' => 'Vui lòng nhập tên khách hàng',
                'txtEmailTT.required' => 'Vui lòng nhập email khách hàng',
                'txtPhoneTT.required' => 'Vui lòng nhập số điện thoại khách hàng',
            ];
            $vali = Validator::make($request->all(), $rules, $messages);

            if ($vali->fails()) {
                return redirect()->back()->withErrors($vali);
            } else {

                $khachhang = KhachHang::find($request->id_KH);

                $ten = $request->txtHoTenTT;
                $email = $request->txtEmailTT;
                $sdt = $request->txtPhoneTT;

                if ($khachhang->kh_email == $email) {
                    $khachhang->kh_ten = $ten;
                    $khachhang->kh_sdt = $sdt;
                    $khachhang->save();

                    return redirect('user/thong-tin-khach-hang');
                } else {
                    $find = KhachHang::where('kh_email', $email)->count();
                    if ($find > 0) {
                        $errors = new MessageBag(['existEmail' => 'Email này đã được đăng ký']);
                        return redirect()->back()->withErrors($errors);
                    } else {
                        $khachhang->kh_ten = $ten;
                        $khachhang->kh_email = $email;
                        $khachhang->kh_sdt = $sdt;
                        $khachhang->save();

                        return redirect('user/thong-tin-khach-hang');
                    }
                }
            }
        }
    }

//--------------------KHÁCH HÀNG THÊM/ SỬA ĐỊA CHỈ---------------------------------------------------------------------------
    public function getThemDiaChi(){

        //Lấy thông tin thành phố-quận/huyện - phường/xã mà cửa hàng sẽ giao hàng
        $thanhpho = ThanhPho::where('trang_thai', 'ON')->get()->toArray();

        return view('users.them-dia-chi', ['thanhpho' => $thanhpho]);
    }
    public function postThemDiaChi(Request $request){

        $rules = [
            'txtDiaChiKH'               => 'required',
            'txtThanhPhoKH'             => 'required',
            'txtQuanHuyenKH'            => 'required',
            'txtPhuongXaKH'             => 'required'
        ];

        $message = [
            'txtDiaChiKH.required'      => 'Địa chỉ không được bỏ trống..',
            'txtThanhPhoKH.required'    => 'Thành phố không được bỏ trống..',
            'txtQuanHuyenKH.required'   => 'Quận/Huyện không được bỏ trống..',
            'txtPhuongXaKH.required'    => 'Phường/Xã không được bỏ trống..'
        ];

        //Biến để xác thực là có vi phạm hay không
        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else {

            //Lấy id của khách hàng
            $id = $request->input('id_KH');

            //Lấy thông tin địa chỉ khách hàng đã nhập
            $dc = $request->input('txtDiaChiKH');
            $tp = ThanhPho::find($request->input('txtThanhPhoKH'));
            $qh = QuanHuyen::find($request->input('txtQuanHuyenKH'));
            $px = PhuongXa::find($request->input('txtPhuongXaKH'));

            if(isset($request['btThemDiaChi'])){
                //Lưu vào csdl
                $item = new DiaChiGiaoHang();
                $item->dcgh_kh_id      = $id;
                $item->dcgh_dia_chi    = $dc;
                $item->dcgh_phuong_xa  = $px->px_id;
                $item->dcgh_quan_huyen = $qh->qh_id;
                $item->dcgh_thanh_pho  = $tp->tp_id;
                $item->save();
            }
            if(isset($request['btSuaDiaChi'])){
                $item = DiaChiGiaoHang::find($request->input('id_DC'));
                $item->dcgh_kh_id      = $id;
                $item->dcgh_dia_chi    = $dc;
                $item->dcgh_phuong_xa  = $px->px_id;
                $item->dcgh_quan_huyen = $qh->qh_id;
                $item->dcgh_thanh_pho  = $tp->tp_id;
                $item->save();
            }

            return redirect('user/thong-tin-khach-hang');
        }
    }

//--------------------KHÁCH HÀNG SỬA ĐỊA CHỈ---------------------------------------------------------------------------
    public function getSuaDiaChi($id_DC){

        //Lấy thông tin địa chỉ của khách hàng
        $diachi = DiaChiGiaoHang::where('dcgh_id',$id_DC)->first();

        //Lấy thông tin thành phố-quận/huyện - phường/xã cũ của khách hàng
        $thanhPho = ThanhPho::all();

        $quanhuyen = QuanHuyen::where('qh_tp_id', $diachi->dcgh_thanh_pho)->get();

        $phuongxa = PhuongXa::where('px_qh_id', $diachi->dcgh_quan_huyen)->get();

        return view('users.them-dia-chi', ['thanhpho' => $thanhPho, 'quanhuyen'=> $quanhuyen,
            'phuongxa' => $phuongxa , 'diachi' => $diachi]);

    }

//--------------------KHÁCH HÀNG RATING---------------------------------------------------------------------------------
    public function getHanhVi(){
        return redirect()->back();
    }
    public function postHanhVi(Request $request){
        $id_kh = $request->id_KH;
        $id_sp = $request->id_SP;

        $hanhvi = HanhVi::where('hv_kh_id', $id_kh)->where('hv_sp_id',$id_sp)->first();

        if(isset($request['bt_1_Sao'])){
            $hanhvi->hv_rating  = 1;
            $hanhvi->updated_at = Carbon::now();
            $hanhvi->save();

            $request->session()->flash('status', 'Cảm ơn bạn đã đánh giá.');
            return redirect()->back();
        }
        if(isset($request['bt_2_Sao'])){
            $hanhvi->hv_rating  = 2;
            $hanhvi->updated_at = Carbon::now();
            $hanhvi->save();

            $request->session()->flash('status', 'Cảm ơn bạn đã đánh giá.');
            return redirect()->back();
        }
        if(isset($request['bt_3_Sao'])){
            $hanhvi->hv_rating  = 3;
            $hanhvi->updated_at = Carbon::now();
            $hanhvi->save();

            $request->session()->flash('status', 'Cảm ơn bạn đã đánh giá.');
            return redirect()->back();
        }
        if(isset($request['bt_4_Sao'])){
            $hanhvi->hv_rating  = 4;
            $hanhvi->updated_at = Carbon::now();
            $hanhvi->save();

            $request->session()->flash('status', 'Cảm ơn bạn đã đánh giá.');
            return redirect()->back();
        }
        if(isset($request['bt_5_Sao'])){
            $hanhvi->hv_rating  = 5;
            $hanhvi->updated_at = Carbon::now();
            $hanhvi->save();

            $request->session()->flash('status', 'Cảm ơn bạn đã đánh giá.');
            return redirect()->back();
        }
    }

//--------------------PHẦN ADMIN----------------------------------------------------------------------------------------
    public function getdangnhapAdmin(){
        return view('admin.login');
    }
    public function postdangnhapAdmin(Request $request)
    {
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
        ],[
            'email.required'=>'Bạn chưa nhập Email',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Password không được nhỏ hơn 3 ký tự ',
            'password.max'=>'Password không được lớn hơn 32 ký tự'
        ]);
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')]))
        {
            return redirect('admin/nguoidung/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }
    public function getDangXuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
