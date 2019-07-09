<?php

namespace App\Http\Controllers;
use App\CuocPhiVanChuyen;
use App\ThanhPho;
use Illuminate\Http\Request;

class cuocphivanchuyenController extends Controller
{
  public function getDanhSach(){
    $cuocphivanchuyen=CuocPhiVanChuyen::all();
    return view('admin.cuocphivanchuyen.danhsach',['cuocphivanchuyen'=>$cuocphivanchuyen]);
  }
  public function getThem(){
    $thanhpho=ThanhPho::all();
    return view('admin.cuocphivanchuyen.them',['thanhpho'=>$thanhpho]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'tp_id'                   =>'required|unique:cuocphivanchuyen,cpvc_tp_id',
          'cpvc_gia_cuoc'           =>'required'
        ],
        [
          'tp_id.required'          =>'Bạn không được để trống mã thành phố',
          'tp_id.unique'            =>'Thành phố này đã có giá cước',
          'cpvc_gia_cuoc.required'  =>'Bạn chưa nhập giá cước vận chuyển',

        ]);
        $cuocphivanchuyen                = new CuocPhiVanChuyen;
        $cuocphivanchuyen->cpvc_gia_cuoc = $request->cpvc_gia_cuoc;
        $cuocphivanchuyen->cpvc_tp_id    = $request->tp_id;
        $cuocphivanchuyen->save();
        return redirect('admin/cuocphivanchuyen/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $thanhpho         = ThanhPho::all();
      $cuocphivanchuyen = CuocPhiVanChuyen::find($id);
      return view('admin.cuocphivanchuyen.sua',['thanhpho'=>$thanhpho,'cuocphivanchuyen' => $cuocphivanchuyen]);
    }
    public function postSua(Request $request,$id){

      $cuocphivanchuyen  =  CuocPhiVanChuyen::find($id);

      $this->validate($request,[
        'tp_id'                     =>'required',
        'cpvc_gia_cuoc'             =>'required|min:0'
      ],
      [
        'tp_id.required'            =>'Bạn không được để trống mục sản phẩm',
        'cpvc_gia_cuoc.required'    =>'Bạn chưa nhập giá cước vận chuyển',
        'cpvc_gia_cuoc.min'         =>'Giá cước vận chuyển phải lớn hơn bằng 0'
      ]);

      $cuocphivanchuyen->cpvc_gia_cuoc  = $request->input('cpvc_gia_cuoc');
      $cuocphivanchuyen->cpvc_tp_id     = $request->input('tp_id');
      $cuocphivanchuyen->save();

      return redirect('admin/cuocphivanchuyen/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $cuocphivanchuyen=CuocPhiVanChuyen::find($id);
        $cuocphivanchuyen->delete();
        return redirect('admin/cuocphivanchuyen/danhsach')->with('thongbao','Xóa thành công');
      }
}
