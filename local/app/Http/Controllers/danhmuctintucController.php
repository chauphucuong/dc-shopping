<?php

namespace App\Http\Controllers;
use App\DanhMucTinTuc;
use Illuminate\Http\Request;

class danhmuctintucController extends Controller
{
  public function getDanhSach(){
    $danhmuctintuc=DanhMucTinTuc::all();
    return view('admin.danhmuctintuc.danhsach',['danhmuctintuc'=>$danhmuctintuc]);
  }
  public function getThem(){
    return view('admin.danhmuctintuc.them');
  }
  public function postThem(Request $request){
  $this->validate($request,[
        'dmtt_ten'=>'required|min:3|max:100'
      ],
      [
        'dmtt_ten.required'=>'Bạn chưa nhập tên danh mục tin tức',
        'dmtt_ten.min'=>'Tên danh mục tin tức chưa đủ 3 kí tự',
        'dmtt_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự'
      ]);
      $danhmuctintuc=new DanhMucTinTuc;
      $danhmuctintuc->dmtt_ten=$request->dmtt_ten;
      $danhmuctintuc->trang_thai=$request->trang_thai;
      $danhmuctintuc->save();
      return redirect('admin/danhmuctintuc/them')->with('thongbao','Thêm thành công');
  }
  public function getSua($id){
    $danhmuctintuc=DanhMucTinTuc::find($id);
    return view('admin.danhmuctintuc.sua',['danhmuctintuc'=>$danhmuctintuc]);
  }
  public function postSua(Request $request,$id){
    $danhmuctintuc=DanhMucTinTuc::find($id);
  $this->validate($request,[
        'dmtt_ten'=>'required|min:3|max:100'
      ],
      [
        'dmtt_ten.required'=>'Bạn chưa nhập tên danh mục tin tức',
        'dmtt_ten.min'=>'Tên danh mục tin tức chưa đủ 3 kí tự',
        'dmtt_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự'
      ]);
      $danhmuctintuc->dmtt_ten=$request->dmtt_ten;
      $danhmuctintuc->trang_thai=$request->trang_thai;
      $danhmuctintuc->save();
      return redirect('admin/danhmuctintuc/sua/'.$id)->with('thongbao','Sửa thành công');
  }
  public function getXoa($id){
    $danhmuctintuc=DanhMucTinTuc::find($id);
    $danhmuctintuc->delete();
    return redirect('admin/danhmuctintuc/danhsach')->with('thongbao','Xóa thành công');
  }
}
