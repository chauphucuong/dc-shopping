<?php

namespace App\Http\Controllers;
use App\DonViTinh;
use Illuminate\Http\Request;

class donvitinhController extends Controller
{
  public function getDanhSach(){
    $donvitinh=DonViTinh::all();
    return view('admin.donvitinh.danhsach',['donvitinh'=>$donvitinh]);
  }
  public function getThem(){
    return view('admin.donvitinh.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'donvitinh_ten'=>'required|min:3|max:30'
    ],
    [
      'donvitinh_ten.required'=>'Bạn chưa nhập tên đơn vị tính',
      'donvitinh_ten.min'=>'Tên đơn vị tính chưa đủ 3 kí tự',
      'donvitinh_ten.max'=>'Bạn chỉ nhập ít hơn 30 kí tự',
    ]);
        $donvitinh=new DonViTinh;
        $donvitinh->donvitinh_ten=$request->donvitinh_ten;
        $donvitinh->chu_thich=$request->chu_thich;
        $donvitinh->save();
        return redirect('admin/donvitinh/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $donvitinh=DonViTinh::find($id);
    return view('admin.donvitinh.sua',['donvitinh'=>$donvitinh]);
  }
  public function postSua(Request $request,$id){
    $donvitinh=DonViTinh::find($id);
    $this->validate($request,[
      'donvitinh_ten'=>'required|min:3|max:100'
    ],
    [
      'donvitinh_ten.required'=>'Bạn chưa nhập tên đơn vị tính',
      'donvitinh_ten.min'=>'tên đơn vị tính chưa đủ 3 kí tự',
      'donvitinh_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
    $donvitinh->donvitinh_ten=$request->donvitinh_ten;
    $donvitinh->chu_thich=$request->chu_thich;
    $donvitinh->save();
    return redirect('admin/donvitinh/sua/'.$id)->with('thongbao','Sửa thành công');
  }
  public function getXoa($id){
    $donvitinh=DonViTinh::find($id);
    $donvitinh->delete();
    return redirect('admin/donvitinh/danhsach')->with('thongbao','Xóa thành công');
  }
}
