<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DanhMucSanPham;
class danhmucsanphamController extends Controller
{
  public function getDanhSach(){
    $danhmucsanpham=DanhMucSanPham::all();
    return view('admin.danhmucsanpham.danhsach',['danhmucsanpham'=>$danhmucsanpham]);
  }

  public function getThem(){
      $parent = DanhMucSanPham::where('parent', 0)->get()->toArray();
      return view('admin.danhmucsanpham.them', ['parent' => $parent]);
  }

  public function postThem(Request $request){
      $this->validate($request,[
        'dmsp_ten'          =>'required',
        'parent'            =>'required'
      ],
      [
        'parent.required'   =>'Bạn chưa nhập parent cho ten danh mục sản phẩm',
        'dmsp_ten.required' =>'Bạn chưa nhập tên danh mục sản phẩm',
      ]);
      $danhmucsanpham               = new DanhMucSanPham;
      $danhmucsanpham->dmsp_ten     = $request->dmsp_ten;
      $danhmucsanpham->parent       = $request->parent;
      $danhmucsanpham->trang_thai   = $request->trang_thai;
      $danhmucsanpham->save();
      return redirect('admin/danhmucsanpham/them')->with('thongbao','Thêm thành công');
  }

  public function getSua($id){
      $danhmucsanpham=DanhMucSanPham::find($id);
      $parent = DanhMucSanPham::where('parent', 0)->get()->toArray();
      return view('admin.danhmucsanpham.sua',['danhmucsanpham'=>$danhmucsanpham, 'parent' => $parent]);
  }

  public function postSua(Request $request,$id){
    $danhmucsanpham=DanhMucSanPham::find($id);
      $this->validate($request,[
        'dmsp_ten'          =>'required',
        'parent'            =>'required'
      ],
      [
        'parent.required'   =>'Bạn chưa nhập parent cho tên danh mục sản phẩm',
        'dmsp_ten.required' =>'Bạn chưa nhập tên danh mục sản phẩm',
      ]);
      $danhmucsanpham->dmsp_ten     = $request->dmsp_ten;
      $danhmucsanpham->parent       = $request->parent;
      $danhmucsanpham->trang_thai   = $request->trang_thai;
      $danhmucsanpham->save();
      return redirect('admin/danhmucsanpham/sua/'.$id)->with('thongbao','Sửa thành công');
  }

  public function getXoa($id){
    $danhmucsanpham=DanhMucSanPham::find($id);
    $danhmucsanpham->delete();
    return redirect('admin/danhmucsanpham/danhsach')->with('thongbao','Xóa thành công');
  }
}
