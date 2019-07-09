<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\MucThue;
use App\LoaiThue;
class mucthueController extends Controller
{
  public function getDanhSach(){
    $mucthue = MucThue::all();
    return view('admin.mucthue.danhsach',['mucthue'=>$mucthue]);
  }
  public function getThem(){
    $loaithue = LoaiThue::all();
    return view('admin.mucthue.them',['loaithue'=>$loaithue]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'mt_ten'                  => 'required',
          'mt_muc_thue'             => 'required',
          'mt_loai_thue'            => 'required',
        ],
        [
          'mt_loai_thue.required'   => 'Bạn không được để trống mã loại thuế',
          'mt_muc_thue.required'    => 'Bạn chưa nhập phần trăm mục thuế',
          'mt_ten.required'         => 'Bạn chưa nhập tên mục thuế',
        ]);
        $mucthue=new MucThue;
        $mucthue->mt_ten            =  $request->mt_ten;
        $mucthue->mt_muc_thue       =  $request->mt_muc_thue;
        $mucthue->mt_loai_thue      =  $request->mt_loai_thue;
        $mucthue->created_at        =  Carbon::now('Asia/Ho_Chi_Minh');
        $mucthue->updated_at        =  Carbon::now('Asia/Ho_Chi_Minh');
        $mucthue->save();
        return redirect('admin/mucthue/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loaithue = LoaiThue::all();
      $mucthue  = MucThue::find($id);
      return view('admin.mucthue.sua',['loaithue'=>$loaithue,'mucthue'=>$mucthue]);
    }
    public function postSua(Request $request,$id){
          $mucthue = MucThue::find($id);
          $this->validate($request,[
            'mt_ten'                => 'required',
            'mt_muc_thue'           => 'required|min:0|max:3',
            'mt_loai_thue'          => 'required',
          ],
          [
            'mt_loai_thue.required' => 'Bạn không được để trống mã loại thuế',
            'mt_muc_thue.required'  => 'Bạn chưa nhập phần trăm mục thuế',
            'mt_ten.required'       => 'Bạn chưa nhập tên mục thuế',
          ]);
          $mucthue->mt_ten          =  $request->mt_ten;
          $mucthue->mt_muc_thue     =  $request->mt_muc_thue;
          $mucthue->mt_loai_thue    =  $request->mt_loai_thue;
          $mucthue->updated_at      =  Carbon::now('Asia/Ho_Chi_Minh');
          $mucthue->save();
          return redirect('admin/mucthue/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $mucthue=MucThue::find($id);
        $mucthue->delete();
        return redirect('admin/mucthue/danhsach')->with('thongbao','Xóa thành công');
      }
}
