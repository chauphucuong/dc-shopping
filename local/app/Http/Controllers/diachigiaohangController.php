<?php

namespace App\Http\Controllers;

use App\PhuongXa;
use App\QuanHuyen;
use App\ThanhPho;
use Illuminate\Http\Request;
use App\KhachHang;
use App\DiaChiGiaoHang;
class diachigiaohangController extends Controller
{
  public function getDanhSach(){
    $diachigiaohang=DiaChiGiaoHang::all();
    return view('admin.diachigiaohang.danhsach',['diachigiaohang'=>$diachigiaohang]);
  }
  public function getThem(){
    $khachhang=KhachHang::all();
    $thanhpho = ThanhPho::where('trang_thai', 'ON')->get()->toArray();
    return view('admin.diachigiaohang.them',['khachhang'=>$khachhang, 'thanhpho' => $thanhpho]);
  }
  public function postThem(Request $request){
        $this->validate($request,[
            'dcgh_kh_id'                =>'required',
            'dcgh_dia_chi'              =>'required',
            'dcgh_thanh_pho'            =>'required',
            'dcgh_quan_huyen'           =>'required',
            'dcgh_phuong_xa'            =>'required',
        ],
        [
            'dcgh_kh_id.required'       =>'Bạn không được để trống mã khách hàng',
            'dcgh_dia_chi.required'     =>'Bạn chưa nhập địa chỉ giao hàng',
            'dcgh_phuong_xa.required'   =>'Bạn không được để trống Phường/Xã',
            'dcgh_quan_huyen.required'  =>'Bạn không được để trống Quận/Huyện',
            'dcgh_thanh_pho.required'   =>'Bạn không được để trống Thành phố'
        ]);
        $diachigiaohang                 = new DiaChiGiaoHang;
        $diachigiaohang->dcgh_kh_id     = $request->dcgh_kh_id;
        $diachigiaohang->dcgh_dia_chi   = $request->dcgh_dia_chi;
        $diachigiaohang->dcgh_phuong_xa = $request->input('dcgh_phuong_xa');
        $diachigiaohang->dcgh_quan_huyen= $request->input('dcgh_quan_huyen');
        $diachigiaohang->dcgh_thanh_pho = $request->input('dcgh_thanh_pho');

        $diachigiaohang->save();
        return redirect('admin/diachigiaohang/them')->with('thongbao','Thêm thành công');
    }
    public function getSua($id){
        $khachhang      = KhachHang::all();

        $diachigiaohang = DiaChiGiaoHang::find($id);

        $thanhpho       = ThanhPho::where('trang_thai', 'ON')->get()->toArray();

        //Lấy thông tin thành phố-quận/huyện - phường/xã cũ của khách hàng

        $oldThanhpho    = ThanhPho::where('tp_ten', $diachigiaohang->dcgh_thanh_pho)->first();
        $quanhuyen      = QuanHuyen::where('qh_tp_id', $oldThanhpho['tp_id'])->get()->toArray();
        $phuongxa       = PhuongXa::where('px_qh_id', $quanhuyen[0]['qh_id'])->get()->toArray();

        return view('admin.diachigiaohang.sua',['khachhang'=>$khachhang,'diachigiaohang'=>$diachigiaohang,
            'thanhpho' => $thanhpho, 'quanhuyen'=> $quanhuyen, 'phuongxa' => $phuongxa ]);
    }
    public function postSua(Request $request,$id){
          $diachigiaohang=DiaChiGiaoHang::find($id);
          $this->validate($request,[
              'dcgh_kh_id'                =>'required',
              'dcgh_dia_chi'              =>'required',
              'dcgh_thanh_pho'            =>'required',
              'dcgh_quan_huyen'           =>'required',
              'dcgh_phuong_xa'            =>'required',
          ],
          [
              'dcgh_kh_id.required'       =>'Bạn không được để trống mã khách hàng',
              'dcgh_dia_chi.required'     =>'Bạn chưa nhập địa chỉ giao hàng',
              'dcgh_phuong_xa.required'   =>'Bạn không được để trống Phường/Xã',
              'dcgh_quan_huyen.required'  =>'Bạn không được để trống Quận/Huyện',
              'dcgh_thanh_pho.required'   =>'Bạn không được để trống Thành phố'
          ]);

          $diachigiaohang->dcgh_kh_id     =$request->dcgh_kh_id;
          $diachigiaohang->dcgh_dia_chi   =$request->dcgh_dia_chi;
          $diachigiaohang->dcgh_phuong_xa = $request->input('dcgh_phuong_xa');
          $diachigiaohang->dcgh_quan_huyen= $request->input('dcgh_quan_huyen');
          $diachigiaohang->dcgh_thanh_pho = $request->input('dcgh_thanh_pho');
          $diachigiaohang->save();
          return redirect('admin/diachigiaohang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $diachigiaohang=DiaChiGiaoHang::find($id);
        $diachigiaohang->delete();
        return redirect('admin/diachigiaohang/danhsach')->with('thongbao','Xóa thành công');
      }
}
