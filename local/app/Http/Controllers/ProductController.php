<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use App\ChiTietDonHang;
use App\DanhMucSanPham;
use App\DonHang;
use App\HanhVi;
use App\HinhAnhSanPham;
use App\KhachHang;
use App\KichThuoc;
use App\LoaiKhuyenMai;
use App\MauSac;
use App\NguoiDung;
use App\NhaSanXuat;
use App\SanPham;
use App\SanPhamYeuThich;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
//-------------------------------------------TRANG DANH MỤC SẢN PHẨM----------------------------------------------------
    public function getPage($id){
        switch ($id){
            case 'danh-sach-yeu-thich':

                //Lấy danh sách sản phẩm đã được yêu thích
                $SPYT = SanPhamYeuThich::all()->toArray();

                $DSSP = array();
                foreach ($SPYT as $item){
                    $DSSP[] = SanPham::where('sp_id', $item['spyt_sp_id'])->where('trang_thai', 'ON')->first();
                }

                return view('san-pham', ['listSP' => $DSSP, 'danhmuc' => 'Sản phẩm yêu thích']);
                break;
            case 'san-pham-khuyen-mai':

                $DSSP = SanPham::where('sp_khuyen_mai_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
                $LKM = LoaiKhuyenMai::where('km_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
                return view('san-pham-khuyen-mai', ['listSP' => $DSSP, 'danhmuc' => 'Sản phẩm khuyến mãi',
                                                        'listKM' => $LKM]);
                break;
            case 'san-pham-moi':

                $sanpham = SanPham::where('trang_thai', 'ON')->get()->toArray();
                $DSSP = array();
                $now = Carbon::now();
                foreach ($sanpham as $item){
                    if($now->diffInDays($item['created_at']) <= 30){
                        $DSSP[] = $item;
                    }
                }
                return view('san-pham', ['listSP' => $DSSP, 'danhmuc' => 'Sản phẩm mới']);
                break;
            case $id:
                $danhmuc = DanhMucSanPham::find($id);
                $DSSP = SanPham::where('sp_danh_muc_id', $danhmuc->dmsp_id)->where('trang_thai', 'ON')->get()->toArray();
                return view('san-pham', ['listSP' => $DSSP, 'danhmuc' => $danhmuc['dmsp_ten']]);
                break;
        }
    }

//-----------------------------------------TRANG SẢN PHẨM THEO NHÀ SẢN XUẤT---------------------------------------------
    public function getNSX($id){
        $NSX     = SanPham::find($id);
        $sanpham = SanPham::where('sp_nsx_id', $id)->get();

        return view('san-pham', ['listSP' => $sanpham, 'danhmuc' => 'Thương hiệu '.$NSX->nsx_ten]);
    }

//-----------------------------------------THÊM/ XÓA SẢN PHẨM YÊU THÍCH-------------------------------------------------
    public function getLove($product_id, $customer_id, $position){

        //Lấy thông tin tài khoản người dùng và sản phẩm
        $taikhoan = NguoiDung::find($customer_id);
        $sanpham  = SanPham::find($product_id);

        //Dùng email của tài khoản để lấy thông tin khách hàng
        $khachhang = KhachHang::where('kh_email', $taikhoan['email'])->first();

        //Biến check để kiểm tra sản phẩm này đã được khách hàng đó thích hay chưa
        $check = SanPhamYeuThich::where('spyt_sp_id', $product_id)->where('spyt_kh_id', $khachhang['kh_id'])->first();

        //Chưa thích thì thêm
        if(!$check){
            $add = new SanPhamYeuThich();
            $add->spyt_sp_id = $sanpham['sp_id'];
            $add->spyt_kh_id = $khachhang['kh_id'];
            $add->save();
        }else{
            //Đã thích thì xóa
            $check->delete();
        }
        //Trở lại trang vừa vào*/
        return redirect()->back()->with('position', $position);
    }

//-----------------------------------------CHI TIẾT SẢN PHẢM------------------------------------------------------------
    public function getDetail($id){
        //Lấy sản phẩm
        $SP = SanPham::find($id);

        //Lấy tất hình ảnh của sản phẩm
        $HA = HinhAnhSanPham::where('hasp_sp_id', $id)->get()->toArray();

        //Lấy kích thước của sản phẩm
        $KT = KichThuoc::where('size_sp_id', $id)->get();

        //Lấy màu của sản phẩm trong hình ảnh
        $MAU = array();
        foreach($HA as $item) {
            $a = MauSac::where('mau_ha_id' ,$item['id'])->get()->toArray();
            if(empty($MAU)){
                $MAU[] = $a;
            }else{
                $x = false;
                foreach ($MAU as $check){
                    if($a[0]['mau_code'] == $check[0]['mau_code']){
                        $x = true;
                    }
                }
                if(!$x){
                    $MAU[] = $a;
                }
            }
        }

        //Tìm nhà sản xuất của sản phẩm
        $NSX = NhaSanXuat::find($SP->sp_nsx_id);

        //Sản phẩm thuộc mục sản phẩm gì
        $LSP = DanhMucSanPham::find($SP->sp_danh_muc_id);

        //Sản phẩm thuộc loại mặt hàng gì
        $LMH = DanhMucSanPham::find($LSP->parent);

        //Danh sách bình luận của các khách hàng
        $BL  = BinhLuan::where('bl_sp_id', $SP->sp_id)->paginate(1);

        //Danh sách đánh giá sản phẩm của khách hàng
        $HV = HanhVi::where('hv_rating', '>', 0)->where('hv_sp_id', $SP->sp_id)->get();
        $tong = 0;
        if($HV == null) {
            foreach ($HV as $item) {
                $tong += $item->hv_rating;
            }
            $tong /= $HV->count();
        }

        return view('chi-tiet-san-pham',['sanpham' => $SP, 'nhasanxuat' => $NSX,
            'loaisanpham' => $LSP, 'loaimathang' => $LMH, 'hinhanh' => $HA, 'color' => $MAU, 'kichthuoc' => $KT,
            'binhluan' => $BL, 'listHanhvi' => $HV, 'tongSao' => $tong]);
    }

    //Chi tiết sản phẩm
    public function postDetail(Request $request,$id){
        $rules = [
            'txtBinhLuan' => 'required',
        ];
        $messages = [
            'txtBinhLuan.required' => 'Nội dung bình luận không được bỏ trống',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->with('status', 'Vui lòng nhập nội dung bình luận');
        }else{
            //Lấy thông tin sản phẩm
            $SP = SanPham::find($id);
            //Lấy thông tin khách hàng
            $KH = KhachHang::find($request->input('id_KHBL'));

            $binhluan = new BinhLuan();
            $binhluan->bl_kh_id    = $KH->kh_id;
            $binhluan->bl_sp_id    = $SP->sp_id;
            $binhluan->bl_noi_dung = $request->txtBinhLuan;
            $binhluan->created_at  = Carbon::now();
            $binhluan->updated_at  = Carbon::now();
            $binhluan->save();

            return redirect()->back()->with('status', 'Cảm ơn bạn đã quan tâm đến sản phẩm');
        }
    }

//-----------------------------------------TÌM KIẾM SẢN PHẨM------------------------------------------------------------
    

    public function postSearch(Request $request){
        $this->validate($request, [
            'txtSearch' => 'required'], [
            'txtSearch.required' => 'Vui lòng nhập nội dung cần tìm..'
        ]);

        $noidung = $request->txtSearch;
        $sanpham = SanPham::where('sp_ten', 'LIKE', '%'.$request->txtSearch.'%')->get();
        return view('san-pham', ['listSP' => $sanpham, 'danhmuc' => $noidung]);
    }
}
