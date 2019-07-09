<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiThanhToan;
class loaithanhtoanController extends Controller
{
  public function getDanhSach(){
    $loaithanhtoan=LoaiThanhToan::all();
    return view('admin.loaithanhtoan.danhsach',['loaithanhtoan'=>$loaithanhtoan]);
  }
  public function getThem(){
    return view('admin.loaithanhtoan.them');
  }
  public function postThem(Request $request){
    $this->validate($request,[
      'ltt_ten'=>'required'
    ],
    [
      'ltt_ten.required'=>'Bạn chưa nhập tên loại thanh toán',
    ]);
        $loaithanhtoan=new LoaiThanhToan;
        $loaithanhtoan->ltt_ten=$request->ltt_ten;
        $loaithanhtoan->ltt_hinh_anh=$request->ltt_hinh_anh;
        if($request->hasFile('ltt_hinh_anh'))
        {
          $file=$request->file('ltt_hinh_anh');
          $duoi=$file->getClientOriginalExtension();
          if($duoi != "jpg" && $duoi != "png" && $duoi != 'jpeg')
          {
            return redirect('admin/loaithanhtoan/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
          }
          $name=$file->getClientOriginalName();
          $ltt_hinh_anh=str_random(4)."_".$name;
          while(file_exists("uploads/loaithanhtoan/".$ltt_hinh_anh))
          {
              $ltt_hinh_anh=str_random(4)."_".$name;
          }
          $file->move("uploads/loaithanhtoan",$ltt_hinh_anh);
          $loaithanhtoan->ltt_hinh_anh=$ltt_hinh_anh;
        }

        $loaithanhtoan->trang_thai=$request->trang_thai;
        $loaithanhtoan->save();
        return redirect('admin/loaithanhtoan/them')->with('thongbao','Thêm thành công');
    }

  public function getSua($id){
    $loaithanhtoan  =   LoaiThanhToan::find($id);
    return view('admin.loaithanhtoan.sua',['loaithanhtoan'=>$loaithanhtoan]);
  }
  public function postSua(Request $request,$id){

    $loaithanhtoan  =   LoaiThanhToan::find($id);

    $this->validate($request,[
      'ltt_ten'=>'required|min:3|max:100'
    ],
    [
      'ltt_ten.required'=>'Bạn chưa nhập tên loại thanh toán',
      'ltt_ten.min'=>'Tên loại thanh toán chưa đủ 3 kí tự',
      'ltt_ten.max'=>'Bạn chỉ nhập ít hơn 100 kí tự',
    ]);
        if($request->hasFile('ltt_hinh_anh')) {
            $file=$request->file('ltt_hinh_anh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi != "jpg" && $duoi != "png" && $duoi != 'jpeg')
            {
                return redirect('admin/loaithanhtoan/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $name=$file->getClientOriginalName();
            $ltt_hinh_anh = str_random(4)."_".$name;
            while(file_exists("uploads/loaithanhtoan/".$ltt_hinh_anh))
            {
                $ltt_hinh_anh = str_random(4)."_".$name;
            }
            $file->move("uploads/loaithanhtoan",$ltt_hinh_anh);

            $loaithanhtoan->ltt_hinh_anh=$ltt_hinh_anh;
        }
        $loaithanhtoan->ltt_ten     = $request->ltt_ten;
        $loaithanhtoan->trang_thai  = $request->trang_thai;
        $loaithanhtoan->save();
        return redirect('admin/loaithanhtoan/sua/'.$id)->with('thongbao','Sửa thành công');
    }
    public function getXoa($id){
      $loaithanhtoan=LoaiThanhToan::find($id);
      $loaithanhtoan->delete();
      return redirect('admin/loaithanhtoan/danhsach')->with('thongbao','Xóa thành công');
    }
}
