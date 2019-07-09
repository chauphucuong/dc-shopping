<?php

namespace App\Http\Controllers;
use App\DiaChiGiaoHang;
use App\KhachHang;
use App\LoaiThanhToan;
use App\CuocPhiVanChuyen;
use App\NhanVien;
use App\PhieuGiamGia;
use App\TinhTrangDonHang;
use App\DonHang;
use Carbon\Carbon;
use Illuminate\Http\Request;

class donhangController extends Controller
{
  public function getDanhSach(){
    $donhang=DonHang::all();
    return view('admin.donhang.danhsach',['donhang'=>$donhang]);
  }

    public function getSua($id){
      $diachifiaohang   = DiaChiGiaoHang::all();
      $loaithanhtoan    = LoaiThanhToan::all();
      $cuocphivanchuyen = CuocPhiVanChuyen::all();
      $phieugiamgia     = PhieuGiamGia::where('trang_thai', 'ON')->get();
      $tinhtrangdonhang = TinhTrangDonHang::all();
      $donhang          = DonHang::find($id);
      $khachhang        = KhachHang::find($donhang->dh_kh_id);
      return view('admin.donhang.sua',['khachhang'=>$khachhang,'loaithanhtoan'=>$loaithanhtoan,
          'cuocphivanchuyen'=>$cuocphivanchuyen,'phieugiamgia'=>$phieugiamgia,'tinhtrangdonhang'=>$tinhtrangdonhang,
          'diachigiaohang'=>$diachifiaohang,'donhang'=>$donhang]);
    }
    public function postSua(Request $request,$id){
          $donhang = DonHang::find($id);
          $donhang->dh_pgg_id         = $request->dh_pgg_id;
          $donhang->dh_ltt_id         = $request->dh_ltt_id;
          $donhang->dh_tinh_trang_id  = $request->dh_tinh_trang_id;
          $donhang->dh_cpvc_id        = $request->dh_cpvc_id;
          $donhang->dh_tong_tien      = $request->dh_tong_tien;
          $donhang->updated_at        = Carbon::now('Asia/Ho_Chi_Minh');
          $donhang->save();
          return redirect('admin/donhang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $donhang=DonHang::find($id);
        $donhang->delete();
        return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
      }
}
