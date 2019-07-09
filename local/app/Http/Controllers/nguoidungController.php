<?php

namespace App\Http\Controllers;
use App\KhachHang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\LoaiNguoiDung;
use App\NguoiDung;
use App\User;
class nguoidungController extends Controller
{
  public function getDanhSach(){
    $nguoidung      =   NguoiDung::all();
    return view('admin.nguoidung.danhsach',['nguoidung'=>$nguoidung]);
  }
  public function getThem(){
    $loainguoidung  =   Loainguoidung::all();
    return view('admin.nguoidung.them',['loainguoidung'=>$loainguoidung]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'nd_lnd_id'          => 'required',
          'name'                => 'required',
          'email'               => 'required|email|min:9|max:100',
          'password'            => 'required|min:3|max:50',
        ],
        [
          'nd_lnd_id.required' => 'Bạn không được để trống mã loại người dùng',
          'name.required'       => 'Bạn chưa nhập tên người dùng',
          'email.required'      => 'Bạn chưa nhập email người dùng',
          'email.email'         => 'Sai định dạng email',
          'email.min'           => 'Email người dùng lớn hơn 9 kí tự(có đuôi @gmail.com)',
          'email.max'           => 'Email người dùng phải < 100 kí tự',
          'password.required'   => 'Bạn chưa nhập password',
          'password.min'        => 'Password lớn hơn 3 kí tự',
          'password.max'        => 'Password nhỏ hơn 50 kí tự'
        ]);

        $khachhang = KhachHang::all();
        $listnguoidung = NguoiDung::all();
        foreach ($khachhang as $item){
            if($item->kh_email == $request->email){
                return redirect()->back()->withErrors('Email đã tồn tại');
            }
        }
      foreach ($listnguoidung as $item){
          if($item->email == $request->email){
              return redirect()->back()->withErrors('Email đã tồn tại');
          }
      }

        $nguoidung              =   new NguoiDung;
        $nguoidung->nd_lnd_id   =   $request->nd_lnd_id;
        $nguoidung->name        =   $request->name;
        $nguoidung->email       =   $request->email;
        $nguoidung->password    =   bcrypt($request->password);
        $nguoidung->created_at  =   Carbon::now('Asia/Ho_Chi_Minh');
        $nguoidung->updated_at  =   Carbon::now('Asia/Ho_Chi_Minh');
        $nguoidung->save();
        return redirect('admin/nguoidung/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loainguoidung    =   Loainguoidung::all();
      $nguoidung        =   nguoidung::find($id);
      return view('admin.nguoidung.sua',['loainguoidung'=>$loainguoidung,'nguoidung'=>$nguoidung]);
    }
    public function postSua(Request $request,$id){
          $nguoidung    =   nguoidung::find($id);
          $this->validate($request,[
              'nd_lnd_id'           => 'required',
              'name'                => 'required',
              'email'               => 'required|email|min:9|max:100',
              'password'            => 'required|min:3|max:50',
          ],
          [
              'nd_lnd_id.required'  => 'Bạn không được để trống mã loại người dùng',
              'name.required'       => 'Bạn chưa nhập tên người dùng',
              'email.required'      => 'Bạn chưa nhập email người dùng',
              'email.email'         => 'Sai định dạng email',
              'email.min'           => 'Email người dùng lớn hơn 9 kí tự(có đuôi @gmail.com)',
              'email.max'           => 'Email người dùng phải < 100 kí tự',
              'password.required'   => 'Bạn chưa nhập password',
              'password.min'        => 'Password lớn hơn 3 kí tự',
              'password.max'        => 'Password nhỏ hơn 50 kí tự'
          ]);
          $nguoidung->nd_lnd_id     =  $request->nd_lnd_id;
          $nguoidung->name          =  $request->name;
          $nguoidung->email         =  $request->email;
          $nguoidung->password      =  bcrypt($request->password);
          $nguoidung->updated_at    =  Carbon::now('Asia/Ho_Chi_Minh');
          $nguoidung->save();
          return redirect('admin/nguoidung/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $nguoidung=NguoiDung::find($id);
        $nguoidung->delete();
        return redirect('admin/nguoidung/danhsach')->with('thongbao','Xóa thành công');
      }

}
