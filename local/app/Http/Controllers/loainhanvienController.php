<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiNhanVien;
class loainhanvienController extends Controller
{
  public function getDanhSach(){
    $loainhanvien=LoaiNhanVien::all();
    return view('admin.loainhanvien.danhsach',['loainhanvien'=>$loainhanvien]);
  }
  public function getThem(){
    return view('admin.loainhanvien.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'lnv_ten'                        => 'required',
      'lnv_luong_co_ban'               => 'required|min:6|max:9'
    ],
    [
      'lnv_ten.required'               => 'Bạn chưa nhập tên loại nhân viên',
      'lnv_luong_co_ban.required'      => 'Bạn chưa nhập lương cơ bản của nhân viên',
      'lnv_luong_co_ban.min'           => 'Lương cơ bản trên 6 số',
      'lnv_luong_co_ban.max'           => 'Lương cơ bản dưới 10 số',
    ]);
        $loainhanvien                  =   new LoaiNhanVien;
        $loainhanvien->lnv_ten         =   $request->lnv_ten;
        $loainhanvien->lnv_luong_co_ban=   $request->lnv_luong_co_ban;
        $loainhanvien->save();
        return redirect('admin/loainhanvien/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $loainhanvien   =   LoaiNhanVien::find($id);
    return view('admin.loainhanvien.sua',['loainhanvien'=>$loainhanvien]);
  }
  public function postSua(Request $request,$id){
    $loainhanvien   =   LoaiNhanVien::find($id);
    $this->validate($request,[
        'lnv_ten'                      => 'required',
        'lnv_luong_co_ban'             => 'required|min:6|max:9'
    ],
    [
        'lnv_ten.required'             => 'Bạn chưa nhập tên loại nhân viên',
        'lnv_luong_co_ban.required'    => 'Bạn chưa nhập lương cơ bản của nhân viên',
        'lnv_luong_co_ban.min'         => 'Lương cơ bản trên 6 số',
        'lnv_luong_co_ban.max'         => 'Lương cơ bản dưới 10 số',
    ]);
        $loainhanvien->lnv_ten         =  $request->lnv_ten;
        $loainhanvien->lnv_luong_co_ban=  $request->lnv_luong_co_ban;
        $loainhanvien->save();
        return redirect('admin/loainhanvien/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
      $loainhanvien=LoaiNhanVien::find($id);
      $loainhanvien->delete();
      return redirect('admin/loainhanvien/danhsach')->with('thongbao','Xóa thành công');
    }
}
