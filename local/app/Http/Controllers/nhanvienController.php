<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\LoaiNhanVien;
use App\NhanVien;
class nhanvienController extends Controller
{
  public function getDanhSach(){
    $nhanvien=NhanVien::all();
    return view('admin.nhanvien.danhsach',['nhanvien'=>$nhanvien]);
  }
  public function getThem(){
    $loainhanvien=LoaiNhanVien::all();
    return view('admin.nhanvien.them',['loainhanvien'=>$loainhanvien]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
          'nv_lnv_id'             =>'required',
          'nv_ten'                =>'required',
          'nv_sdt'                =>'min:9|max:11',
          'nv_dia_chi'            =>'required',
          'nv_email'              =>'required|email|min:10',
        ],
        [
          'nv_lnv_id.required'    => 'Bạn không được để trống mã loại nhân viên',
          'nv_ten.required'       => 'Bạn chưa nhập tên nhân viên',
          'nv_sdt.min'            => 'Số điện thoại lớn hơn 9 kí tự',
          'nv_sdt.max'            => 'Số điện thoại nhỏ hơn 11 kí tự',
          'nv_dia_chi.required'   => 'Bạn chưa nhập địa chỉ',
          'nv_email.required'     => 'Bạn chưa nhập email',
          'nv_email.min'          => 'Email lớn hơn 10 kí tự',
          'nv_email.email'        => 'Định dạng email không đúng',
        ]);
        $nhanvien                 =   new NhanVien;
        $nhanvien->nv_lnv_id      =   $request->nv_lnv_id;
        $nhanvien->nv_ten         =   $request->nv_ten;
        $nhanvien->nv_sdt         =   $request->nv_sdt;
        $nhanvien->nv_dia_chi     =   $request->nv_dia_chi;
        $nhanvien->nv_email       =   $request->nv_email;
        $nhanvien->nv_so_ngay_nghi=   0;
        $nhanvien->created_at     =   Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->updated_at     =   Carbon::now('Asia/Ho_Chi_Minh');
        $nhanvien->save();
        return redirect('admin/nhanvien/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
      $loainhanvien=LoaiNhanVien::all();
      $nhanvien=NhanVien::find($id);
      return view('admin.nhanvien.sua',['loainhanvien'=>$loainhanvien,'nhanvien'=>$nhanvien]);
    }
    public function postSua(Request $request,$id){
          $nhanvien=NhanVien::find($id);
          $this->validate($request,[
            'nv_lnv_id'                 =>  'required',
            'nv_ten'                    =>  'required|min:10',
            'nv_sdt'                    =>  'min:9|max:11',
            'nv_dia_chi'                =>  'required',
            'nv_email'                  =>  'required|min:10',
            'nv_so_ngay_nghi'           =>  'required'
          ],
          [
            'nv_lnv_id.required'        => 'Bạn không được để trống mã loại nhân viên',
            'nv_ten.required'           => 'Bạn chưa nhập tên nhân viên',
            'nv_ten.min'                => 'Tên nhân viên phải > 10 kí tự',
            'nv_sdt.min'                => 'Số điện thoại lớn hơn 9 kí tự',
            'nv_sdt.max'                => 'Số điện thoại nhỏ hơn 11 kí tự',
            'nv_dia_chi.required'       => 'Bạn chưa nhập địa chỉ',
            'nv_email.required'         => 'Bạn chưa nhập email',
            'nv_email.min'              => 'Email lớn hơn 10 kí tự',
            'nv_so_ngay_nghi.required'  => 'Bạn chưa nhập số ngày nghỉ',
          ]);
          $nhanvien->nv_lnv_id          =   $request->nv_lnv_id;
          $nhanvien->nv_ten             =   $request->nv_ten;
          $nhanvien->nv_sdt             =   $request->nv_sdt;
          $nhanvien->nv_dia_chi         =   $request->nv_dia_chi;
          $nhanvien->nv_email           =   $request->nv_email;
          $nhanvien->nv_so_ngay_nghi    =   $request->nv_so_ngay_nghi;
          $nhanvien->updated_at         =   Carbon::now('Asia/Ho_Chi_Minh');
          $nhanvien->save();
          return redirect('admin/nhanvien/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $nhanvien=NhanVien::find($id);
        $nhanvien->delete();
        return redirect('admin/nhanvien/danhsach')->with('thongbao','Xóa thành công');
      }

}
