<?php

namespace App\Http\Controllers;

use App\EmailNhanTinKhuyenMai;
use Illuminate\Http\Request;

class emailnhantinkhuyemaiController extends Controller
{
    public function getDanhSach(){
        $email   =   EmailNhanTinKhuyenMai::all();
        return view('admin.emailnhantinkhuyenmai.danhsach',['email'=>$email]);
    }

    public function getXoa($email_id){
        $binhluan   =   EmailNhanTinKhuyenMai::find($email_id);
        $binhluan->delete();
        return redirect('admin/emailnhantinkhuyenmai/danhsach')->with('thongbao','Xóa thành công');
    }
}
