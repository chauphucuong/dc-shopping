<?php

namespace App\Http\Controllers;

use App\ChiTietDonHang;
use App\LoaiKhuyenMai;
use App\NguoiDung;
use App\NhaSanXuat;
use App\SanPham;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //Trang chủ
    public function getHome(){

        $sanpham = SanPham::where('trang_thai', 'ON')->get();
        $sanphamkhuyenmai = SanPham::where('sp_khuyen_mai_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
        $loaikhuyenmai = LoaiKhuyenMai::where('km_id', '<>', 2)->where('trang_thai', 'ON')->get()->toArray();
        $nsx = NhaSanXuat::where('trang_thai', 'ON')->get();
        $sanphambanchay = array();
        $sanphammoi = array();
        $now = Carbon::now();
        foreach ($sanpham as $item){
            if(ChiTietDonHang::where('ctdh_sp_id', $item->sp_id)->get()){
                $sanphambanchay[] = $item;
            }
            if($now->diffInDays($item['created_at']) <= 30){
                $sanphammoi[] = $item;
            }
        }

        return view('index', ['sanpham' => $sanpham, 'loaikhuyenmai' => $loaikhuyenmai,
            'sanphamkhuyenmai' => $sanphamkhuyenmai, 'sanphambanchay' => $sanphambanchay,
            'sanphammoi' => $sanphammoi, 'nhasanxuat' => $nsx]);
    }

    //Trang tin tức
    public function getNew($id){

    }

    //Trang giới thiệu
    public function getGioiThieu(){
        return view('gioi-thieu');
    }

    //Trang Chính sách vận chuyển
    public function getChinhSachVanChuyen(){
        return view('chinh-sach-van-chuyen');
    }

    //Trang Quy định về Chính sách
    public function getQuyDinhVaChinhSach(){
        return view('quy-dinh-ve-chinh-sach');
    }

    //Trang Chính sách đổi trả
    public function getChinhSachDoiTra(){
        return view('chinh-sach-doi-tra');
    }

    //Trang Chính sách bảo mật
    public function getChinhSachBaoMat(){
        return view('chinh-sach-bao-mat');
    }

    //Trang Chính sách bảo hành
    public function getChinhSachBaoHanh(){
        return view('chinh-sach-bao-hanh');
    }

    //Trang quên mật khẩu của khách hàng
    public function getForgotPasswordUser(){
        return view('users.forgot-password');
    }
    public function postForgotPasswordUser(Request $request){
        $rules = [ 'txtUserEmailFP' => 'required|email'];
        $messages = [
          'txtUserEmailFP.required' => 'Vui lòng nhập email',
          'txtUserEmailFP.email'    => 'Email vừa nhập không đúng định dạng',
        ];

        $vali = Validator::make($request->all(), $rules, $messages);

        if($vali->fails()){
            return redirect()->back()->withErrors($vali);
        }else{
            $email = $request->input('txtUserEmailFP');
            $find = NguoiDung::where('email', $email)->where('nd_lnd_id', 2)->first();
            if($find == null){
                return redirect()->back()->withErrors( 'Email này không tồn tại');
            }else{
                $find->password = bcrypt('abc123');
                $find->updated_at = Carbon::now();
                $find->save();
                $data = ['name' => $find->name, 'pass' => 'abc123', 'email' => $find->email];
                Mail::send('mail-reset-password', $data, function ($msg) use($find){
                    $msg->to($find->email, $find->name)->subject('Reset password!');
                });
                $request->session()->flash('status', 'Bạn vừa đặt lại mật khẩu thành công vui lòng kiểm tra mail để biết thông tin chi tiết.');
                return redirect()->back();
            }
        }
    }


}
