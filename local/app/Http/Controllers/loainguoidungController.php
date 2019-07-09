<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiNguoiDung;
class loainguoidungController extends Controller
{
  public function getDanhSach(){
    $loainguoidung=LoaiNguoiDung::all();
    return view('admin.loainguoidung.danhsach',['loainguoidung'=>$loainguoidung]);
  }
  public function getThem(){
    return view('admin.loainguoidung.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'lnd_ten'         =>'required'
    ],
    [
      'lnd_ten.required'=>'Bạn chưa nhập tên tên loại người dùng',
    ]);
        $loainguoidung  =   new LoaiNguoiDung;
        $loainguoidung->lnd_ten=$request->lnd_ten;
        $loainguoidung->save();
        return redirect('admin/loainguoidung/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $loainguoidung=LoaiNguoiDung::find($id);
    return view('admin.loainguoidung.sua',['loainguoidung'=>$loainguoidung]);
  }
  public function postSua(Request $request,$id){
    $loainguoidung=LoaiNguoiDung::find($id);
    $this->validate($request,[
      'lnd_ten'=>'required'
    ],
    [
      'lnd_ten.required'=>'Bạn chưa nhập tên loại người dùng',
    ]);
        $loainguoidung->lnd_ten=$request->lnd_ten;
        $loainguoidung->save();
        return redirect('admin/loainguoidung/sua/'.$id)->with('thongbao','Sửa thành công');
    }
  public function getXoa($id){
    $loainguoidung=LoaiNguoiDung::find($id);
    $loainguoidung->delete();
    return redirect('admin/loainguoidung/danhsach')->with('thongbao','Xóa thành công');
  }

}
