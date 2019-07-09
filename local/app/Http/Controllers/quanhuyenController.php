<?php

namespace App\Http\Controllers;

use App\QuanHuyen;
use App\ThanhPho;
use Illuminate\Http\Request;

class quanhuyenController extends Controller
{
    public function getDanhSach(){
        $quanhuyen = QuanHuyen::all();
        return view('admin.quanhuyen.danhsach',['quanhuyen'=>$quanhuyen]);
    }
    public function getThem(){
        $thanhpho = ThanhPho::all();
        return view('admin.quanhuyen.them',['thanhpho'=>$thanhpho]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'qh_ten'             => 'required',
            'qh_tp_id'           => 'required',
        ],
        [
            'qh_ten.required'    => 'Bạn chưa nhập tên Quận/Huyện',
            'qh_tp_id.required'  => 'Quận/Huyện thuộc thành phố nào ?',
        ]);
        $quanhuyen               =  new QuanHuyen();
        $quanhuyen->qh_ten       =  $request->qh_ten;
        $quanhuyen->qh_tp_id     =  $request->qh_tp_id;
        $quanhuyen->trang_thai   =  $request->trang_thai;
        $quanhuyen->save();
        return redirect('admin/quanhuyen/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($qh_id){
        $quanhuyen = QuanHuyen::find($qh_id);
        $thanhpho  = ThanhPho::all();
        return view('admin.quanhuyen.sua',['quanhuyen'=>$quanhuyen, 'thanhpho'=>$thanhpho]);
    }
    public function postSua(Request $request,$qh_id){
        $quanhuyen = QuanHuyen::find($qh_id);
        $this->validate($request,['qh_ten'    => 'required'], ['qh_ten.required'  => 'Bạn chưa nhập tên Quận/Huyện',]);
        $quanhuyen->qh_ten       =  $request->qh_ten;
        $quanhuyen->qh_tp_id     =  $request->qh_tp_id;
        $quanhuyen->trang_thai   =  $request->trang_thai;
        $quanhuyen->save();
        return redirect('admin/quanhuyen/sua/'.$qh_id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($qh_id){
        $quanhuyen = QuanHuyen::find($qh_id);
        $quanhuyen->delete();
        return redirect('admin/quanhuyen/danhsach')->with('thongbao','Xóa thành công');
    }
}
