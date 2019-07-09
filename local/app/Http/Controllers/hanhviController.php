<?php

namespace App\Http\Controllers;


use App\HanhVi;

class hanhviController extends Controller
{
    public function getDanhSach(){
        $hanhvi   =   HanhVi::all();
        return view('admin.hanhvi.danhsach',['hanhvi'=>$hanhvi]);
    }

    public function getXoa($hv_id){
        $hanhvi   =   HanhVi::find($hv_id);
        $hanhvi->delete();
        return redirect('admin/hanhvi/danhsach')->with('thongbao','Xóa thành công');
    }


}
