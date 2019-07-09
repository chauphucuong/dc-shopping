<?php

namespace App\Http\Controllers;
use App\KhoHang;
use Illuminate\Http\Request;

class KhoHangController extends Controller
{
  public function getDanhSach(){
    $khohang    = KhoHang::all();

    return view('admin.khohang.danhsach',['khohang'=>$khohang]);
  }
  public function getThem(){
    return view('admin.khohang.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'khohang_ten'          => 'required'
    ],
    [
      'khohang_ten.required' => 'Bạn chưa nhập tên kho hàng',
    ]);

        $khohang=new KhoHang;
        $khohang->khohang_ten = $request->khohang_ten;
        $khohang->trang_thai  = $request->trang_thai;

        $khohang->save();
        return redirect('admin/khohang/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $khohang=KhoHang::find($id);
    return view('admin.khohang.sua',['khohang'=>$khohang]);
  }
  public function postSua(Request $request,$id){
    $khohang=KhoHang::find($id);
    $this->validate($request,[
      'khohang_ten'           =>'required'
    ],
    [
      'khohang_ten.required'  =>'Bạn chưa nhập tên kho hàng',
    ]);
        $khohang->khohang_ten = $request->khohang_ten;
        $khohang->trang_thai  = $request->trang_thai;
        $khohang->save();
        return redirect('admin/khohang/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
      $khohang=KhoHang::find($id);
      $khohang->delete();
      return redirect('admin/khohang/danhsach')->with('thongbao','Xóa thành công');
    }
}
