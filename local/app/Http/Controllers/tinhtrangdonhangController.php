<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinhTrangDonHang;
class tinhtrangdonhangController extends Controller
{
  public function getDanhSach(){
    $tinhtrangdonhang=TinhTrangDonHang::all();
    return view('admin.tinhtrangdonhang.danhsach',['tinhtrangdonhang'=>$tinhtrangdonhang]);
  }
  public function getThem(){
    return view('admin.tinhtrangdonhang.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'tinh_trang_ten'          => 'required'
    ],
    [
      'tinh_trang_ten.required' => 'Bạn chưa nhập tên danh mục sản phẩm',
    ]);
        $tinhtrangdonhang       =  new TinhTrangDonHang;
        $tinhtrangdonhang->tinh_trang_ten=$request->tinh_trang_ten;
        $tinhtrangdonhang->save();
        return redirect('admin/tinhtrangdonhang/them')->with('thongbao','Thêm thành công');
    }
  public function getSua($id){
    $tinhtrangdonhang=TinhTrangDonHang::find($id);
    return view('admin.tinhtrangdonhang.sua',['tinhtrangdonhang'=>$tinhtrangdonhang]);
  }
  public function postSua(Request $request,$id){
    $tinhtrangdonhang=TinhTrangDonHang::find($id);
    $this->validate($request,[
      'tinh_trang_ten'          =>'required'
    ],
    [
      'tinh_trang_ten.required' =>'Bạn chưa nhập tên danh mục sản phẩm',

    ]);
        $tinhtrangdonhang->tinh_trang_ten = $request->tinh_trang_ten;
        $tinhtrangdonhang->save();
        return redirect('admin/tinhtrangdonhang/sua/'.$id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($id){
      $tinhtrangdonhang=TinhTrangDonHang::find($id);
      $tinhtrangdonhang->delete();
      return redirect('admin/tinhtrangdonhang/danhsach')->with('thongbao','Xóa thành công');
    }
}
