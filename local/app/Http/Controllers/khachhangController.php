<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KhachHang;
class khachhangController extends Controller
{
    public function getDanhSach(){
        $khachhang = KhachHang::all();
        return view('admin.khachhang.danhsach',['khachhang'=>$khachhang]);
    }

    public function getXoa($id){
        $khachhang = KhachHang::find($id);
        $khachhang->delete();
    return redirect('admin/khachhang/danhsach')->with('thongbao','Xoá thành công');
    }
}
