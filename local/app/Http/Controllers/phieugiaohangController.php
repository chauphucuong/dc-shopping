<?php

namespace App\Http\Controllers;

use App\DonHang;
use App\NhanVien;
use App\PhieuGiaoHang;
use App\TinhTrangDonHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class phieugiaohangController extends Controller
{
    public function getDanhSach(){
        $phieugiaohang   =   PhieuGiaoHang::all();
        return view('admin.phieugiaohang.danhsach',['phieugiaohang'=>$phieugiaohang]);
    }

    public function getThem(){
        $donhang   = DonHang::all();
        $nhanvien  = NhanVien::all();
        $tinhtrang = TinhTrangDonHang::all();
        return view('admin.phieugiaohang.them', ['donhang' => $donhang, 'nhanvien' => $nhanvien, 'tinhtrang' => $tinhtrang]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'pgh_dh_id'                     => 'required|unique:phieugiaohang,pgh_dh_id',
            'pgh_nv_id'                     => 'required',
            'pgh_ngay_giao_hang'            => 'required',
            'pgh_tinh_trang_id'             => 'required',
        ],
        [
            'pgh_dh_id.required'            => 'Bạn chưa chọn đơn hàng của ngày nào',
            'pgh_dh_id.unique'              => 'Đơn hàng này đã có nhân viên phụ trách',
            'pgh_nv_id.required'            => 'Bạn chưa chọn nhân viên phụ trách đơn hàng',
            'pgh_ngay_giao_hang.required'   => 'Bạn chưa nhập ngày giao hàng',
            'pgh_tinh_trang_id.required'    => 'Bạn chưa tình trạng cho đơn hàng',
        ]);

        $now                                =  strtotime(date('Y-m-d'));
        $ngaydathang                        =  strtotime(DonHang::find($request->pgh_dh_id)->dh_ngay_dat_hang);
        $ngaygiaohang                       =  strtotime($request->pgh_ngay_giao_hang);

        $phieu                              =  new PhieuGiaoHang();
        $phieu->pgh_dh_id                   =  $request->pgh_dh_id;
        $phieu->pgh_nv_id                   =  $request->pgh_nv_id;

        if($ngaygiaohang < $now || $ngaygiaohang < $ngaydathang){
            return redirect()->back()->withErrors('Ngày giao hàng không thể nhỏ hơn hôm nay hoặc nhỏ hơn ngày khách hàng đặt hàng');
        }else{
            $phieu->pgh_ngay_giao_hang      =  $request->pgh_ngay_giao_hang;
        }
        $phieu->pgh_tinh_trang_id           =  $request->pgh_tinh_trang_id;
        $phieu->save();
        return redirect('admin/phieugiaohang/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($pgh_id){
        $phieu      =   PhieuGiaoHang::find($pgh_id);
        $donhang    =   DonHang::all();
        $nhanvien   =   NhanVien::all();
        $tinhtrang  =   TinhTrangDonHang::all();
        return view('admin.phieugiaohang.sua',['phieugiaohang'=>$phieu,'donhang' => $donhang,
            'nhanvien' => $nhanvien, 'tinhtrang' => $tinhtrang]);
    }
    public function postSua(Request $request,$id){
        $phieu      =   PhieuGiaoHang::find($id);

        $ngaydathang                        =  strtotime(DonHang::find($request->pgh_dh_id)->dh_ngay_dat_hang);
        $ngaygiaohang                       =  strtotime($request->pgh_ngay_giao_hang);
        if($ngaygiaohang < $ngaydathang){
            return redirect()->back()->withErrors('Ngày giao hàng không thể nhỏ hơn ngày khách đã đặt hàng');
        }else{
            $phieu->pgh_ngay_giao_hang      =  $request->pgh_ngay_giao_hang;
        }

        if($request->pgh_dh_id != $phieu->pgh_dh_id){
            $phieu->pgh_dh_id                   =  $request->pgh_dh_id;
        }

        $phieu->pgh_nv_id                   =  $request->pgh_nv_id;
        $phieu->pgh_tinh_trang_id           =  $request->pgh_tinh_trang_id;
        $phieu->save();
        return redirect()->back()->with('thongbao','Sủa thành công');
    }

    public function getXoa($pgh_id){
        $phieugiaohang   =   PhieuGiaoHang::find($pgh_id);
        $phieugiaohang->delete();
        return redirect('admin/phieugiaohang/danhsach')->with('thongbao','Xóa thành công');
    }
}
