<?php

namespace App\Http\Controllers;

use App\BinhLuan;

class binhluanController extends Controller
{
    public function getDanhSach(){
        $binhluan   =   BinhLuan::all();
        return view('admin.binhluan.danhsach',['binhluan'=>$binhluan]);
    }

    public function getXoa($bl_id){
        $binhluan   =   BinhLuan::find($bl_id);
        $binhluan->delete();
        return redirect('admin/binhluan/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getPhanhoi(){
        // return view('admin.binhluan.phanhoi');
        return view('form');
    }
}
