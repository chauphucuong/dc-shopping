<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiThue;
class loaithueController extends Controller
{
  public function getDanhSach(){
    $loaithue = LoaiThue::all();
    return view('admin.loaithue.danhsach',['loaithue'=>$loaithue]);
  }
  public function getThem(){
    return view('admin.loaithue.them');
  }

  public function postThem(Request $request){
        $this->validate($request,[
          'loai_thue_ten'=>'required'
        ],
        [
          'loai_thue_ten.required'=>'Bạn chưa nhập tên loại thuế',
        ]);
        $loaithue               = new LoaiThue;
        $loaithue->loai_thue_ten= $request->loai_thue_ten;
        $loaithue->chu_thich    = $request->chu_thich;
        $loaithue->trang_thai   = $request->trang_thai;
        $loaithue->save();
        return redirect('admin/loaithue/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
      $loaithue = LoaiThue::find($id);
      return view('admin.loaithue.sua',['loaithue'=>$loaithue]);
    }
    public function postSua(Request $request,$id){
      $loaithue=LoaiThue::find($id);
      $this->validate($request,[
        'loai_thue_ten'         => 'required'
      ],
      [
        'loai_thue_ten.required'=> 'Bạn chưa nhập tên loại thuế',
      ]);
      $loaithue->loai_thue_ten  =   $request->loai_thue_ten;
      $loaithue->chu_thich      =   $request->chu_thich;
      $loaithue->trang_thai     =   $request->trang_thai;
      $loaithue->save();
      return redirect('admin/loaithue/sua/'.$id)->with('thongbao','Sửa thành công');
      }

    public function getXoa($id){
      $loaithue=LoaiThue::find($id);
      $loaithue->delete();
      return redirect('admin/loaithue/danhsach')->with('thongbao','Xóa thành công');
    }
}
