<?php

namespace App\Http\Controllers;
use App\CuocPhiVanCHuyen;
use App\ThanhPho;
use Illuminate\Http\Request;

class ThanhPhoController extends Controller
{
    public function getDanhSach(){
        $thanhpho = ThanhPho::all();
        return view('admin.thanhpho.danhsach',['thanhpho'=>$thanhpho]);
    }
    public function getThem(){
        return view('admin.thanhpho.them');
    }

    public function postThem(Request $request){
        $this->validate($request,[
          'tp_ten'              => 'required|unique:thanhpho, tp_ten'
        ],
        [
            'tp_ten.required'   => 'Bạn chưa nhập tên thành phố',
            'tp_ten.unique'     => 'Tên thành phố đã tồn tại',
        ]);
        $thanhpho = new ThanhPho();
        $thanhpho->tp_ten       =  $request->tp_ten;
        $thanhpho->trang_thai   =  $request->trang_thai;
        $thanhpho->save();

        $cuocphi                = new CuocPhiVanCHuyen();
        $cuocphi->cpvc_tp_id    = $thanhpho->tp_id;
        $cuocphi->cpvc_gia_cuoc = 0;
        $cuocphi->save();
        return redirect('admin/thanhpho/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($id){
        $thanhpho = ThanhPho::find($id);
        return view('admin.thanhpho.sua',['thanhpho'=>$thanhpho]);
    }
    public function postSua(Request $request,$id){
        $thanhpho   =   ThanhPho::find($id);
        $this->validate($request,['tp_ten'    => 'required'], ['tp_ten.required'  => 'Bạn chưa nhập tên thành phố',]);
        $thanhpho->tp_ten     =  $request->tp_ten;
        $thanhpho->trang_thai =  $request->trang_thai;
        $thanhpho->save();
        return redirect('admin/thanhpho/sua/'.$id)->with('thongbao','Sửa thành công');
      }

    public function getXoa($id){
        $thanhpho=ThanhPho::find($id);
        $thanhpho->delete();
        return redirect('admin/thanhpho/danhsach')->with('thongbao','Xóa thành công');
    }
}
