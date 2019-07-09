<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhieuGiamGia;
class phieugiamgiaController extends Controller
{
  public function getDanhSach(){
    $phieugiamgia=PhieuGiamGia::all();
    return view('admin.phieugiamgia.danhsach',['phieugiamgia'=>$phieugiamgia]);
  }
  public function getThem(){
    return view('admin.phieugiamgia.them');
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'pgg_ten'                         => 'required',
          'pgg_giam_gia'                    => 'required',
        ],
        [
          'pgg_ten.required'                => 'Bạn chưa nhập tên phiếu giảm giá',
          'pgg_giam_gia.required'           => 'Bạn chưa nhập giá phiếu giảm giá',
        ]);
        $now = strtotime(date('Y-m-d'));
        $start = strtotime($request->pgg_ngay_bat_dau);
        $end = strtotime($request->pgg_ngay_ket_thuc);
        if($start > $end || $start <= $now || $end <= $now){
            return redirect()->back()->withErrors('Ngày áp dụng không hợp lệ');
        }else{
            $phieugiamgia                    =   new PhieuGiamGia;
            $phieugiamgia->pgg_ten           =   $request->pgg_ten;
            $phieugiamgia->pgg_giam_gia      =   $request->pgg_giam_gia;
            $phieugiamgia->ngay_bat_dau      =   $request->pgg_ngay_bat_dau;
            $phieugiamgia->ngay_ket_thuc     =   $request->pgg_ngay_ket_thuc;
            $phieugiamgia->trang_thai        =   $request->trang_thai;
            $phieugiamgia->save();
            return redirect('admin/phieugiamgia/them')->with('thongbao','Thêm thành công');
        }

    }
    public function getSua($id){
      $phieugiamgia=PhieuGiamGia::find($id);
      return view('admin.phieugiamgia.sua',['phieugiamgia'=>$phieugiamgia]);
    }
    public function postSua(Request $request,$id){
          $phieugiamgia=PhieuGiamGia::find($id);
          $this->validate($request,[
            'pgg_ten'                       =>'required',
            'pgg_giam_gia'                  =>'required',
          ],
          [
            'pgg_ten.required'              =>'Bạn chưa nhập tên phiếu giảm giá',
            'pgg_giam_gia.required'         =>'Bạn chưa nhập phẩn trăm phiếu giảm giá',
          ]);

        $now                                = strtotime(date('Y-m-d'));
        $start                              = strtotime($request->pgg_ngay_bat_dau);
        $end                                = strtotime($request->pgg_ngay_ket_thuc);
        if($start > $end || $start <= $now || $end <= $now){
            return redirect()->back()->withErrors('Ngày áp dụng không hợp lệ');
        }else {
            $phieugiamgia->pgg_ten          = $request->pgg_ten;
            $phieugiamgia->pgg_giam_gia     = $request->pgg_giam_gia;
            $phieugiamgia->ngay_bat_dau     = $request->pgg_ngay_bat_dau;
            $phieugiamgia->ngay_ket_thuc    = $request->pgg_ngay_ket_thuc;
            $phieugiamgia->trang_thai       = $request->trang_thai;
            $phieugiamgia->save();
            return redirect()->back()->with('thongbao', 'Thêm thành công');
        }
      }
    public function getXoa($id){
      $phieugiamgia=PhieuGiamGia::find($id);
      $phieugiamgia->delete();
      return redirect('admin/phieugiamgia/danhsach')->with('thongbao','Xóa thành công');
  }
}
