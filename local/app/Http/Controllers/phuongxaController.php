<?php

namespace App\Http\Controllers;

use App\PhuongXa;
use App\QuanHuyen;
use App\ThanhPho;
use Illuminate\Http\Request;

class phuongxaController extends Controller
{
    public function getDanhSach(){
        $phuongxa  = PhuongXa::all();
        return view('admin.phuongxa.danhsach',['phuongxa'=>$phuongxa]);
    }
    public function getThem(){
        $quanhuyen = QuanHuyen::all();
        $thanhpho  = ThanhPho::all();
        return view('admin.phuongxa.them',['quanhuyen'=>$quanhuyen, 'thanhpho' => $thanhpho]);
    }

    public function postThem(Request $request){
        $this->validate($request,[
            'tp_id'              => 'required',
            'px_ten'             => 'required',
            'px_qh_id'           => 'required',
        ],
        [
            'px_ten.required'    => 'Bạn chưa nhập tên Phường/Xã',
            'tp_id.required'     => 'Bạn chưa chọn Thành phố',
            'px_qh_id.required'  => 'Bạn chưa chọn Quận/Huyện',
        ]);
        $phuongxa                =  new PhuongXa();
        $phuongxa->px_ten        =  $request->px_ten;
        $phuongxa->px_qh_id      =  $request->px_qh_id;
        $phuongxa->trang_thai    =  $request->trang_thai;
        $phuongxa->save();
        return redirect('admin/phuongxa/them')->with('thongbao','Thêm thành công');
    }

    public function getSua($px_id){

        $phuongxa   = PhuongXa::find($px_id);
        $oldQuan    = QuanHuyen::find($phuongxa->px_qh_id);
        $thanhpho   = ThanhPho::all();
        $quanhuyen  = QuanHuyen::where('qh_tp_id', $oldQuan->qh_tp_id)->get();

        return view('admin.phuongxa.sua',['phuongxa'=>$phuongxa, 'quanhuyen'=>$quanhuyen, 'thanhpho' => $thanhpho,
            'oldQuan' => $oldQuan]);
    }
    public function postSua(Request $request,$px_id){
        $this->validate($request,[
            'px_ten'             => 'required',
            'px_qh_id'           => 'required',
        ],
        [
            'px_ten.required'    => 'Bạn chưa nhập tên Phường/Xã',
            'px_qh_id.required'  => 'Bạn chưa chọn Quận/Huyện',
        ]);
        $phuongxa                =  PhuongXa::find($px_id);
        $phuongxa->px_ten        =  $request->px_ten;
        $phuongxa->px_qh_id      =  $request->px_qh_id;
        $phuongxa->trang_thai    =  $request->trang_thai;
        $phuongxa->save();
        return redirect('admin/phuongxa/sua/'.$px_id)->with('thongbao','Sửa thành công');
    }

    public function getXoa($px_id){
        $phuongxa  =  PhuongXa::find($px_id);
        $phuongxa->delete();
        return redirect('admin/phuongxa/danhsach')->with('thongbao','Xóa thành công');
    }
}
