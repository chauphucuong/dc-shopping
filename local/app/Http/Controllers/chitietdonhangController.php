<?php

namespace App\Http\Controllers;
use App\ChiTietDonHang;
use App\DonHang;
use App\SanPham;
use Illuminate\Http\Request;

class chitietdonhangController extends Controller
{
  public function getDanhSach(){
    $chitietdonhang=ChiTietDonHang::all();
    return view('admin.chitietdonhang.danhsach',['chitietdonhang'=>$chitietdonhang]);
  }

    public function getSua($id){
      $donhang=DonHang::all();
      $sanpham=SanPham::all();
      $chitietdonhang=ChiTietDonHang::find($id);
      return view('admin.chitietdonhang.sua',['donhang'=>$donhang,'sanpham'=>$sanpham,'chitietdonhang'=>$chitietdonhang]);
    }
    public function postSua(Request $request,$id){
          $chitietdonhang=ChiTietDonHang::find($id);
          $this->validate($request,[
            'ctdh_sp_id'=>'required',
            'ctdh_dh_id'=>'required',
            'ctdh_so_luong'=>'required|min:0|max:10',
            'ctdh_gia_ban'=>'required|min:4|max:20'
          ],
          [
            'ctdh_sp_id.required'=>'Bạn không được để trống mục sản phẩm',
            'ctdh_dh_id.required'=>'Bạn không được để trống mục khách hàng',
            'ctdh_so_luong.required'=>'Bạn chưa nhập số lượng',
            'ctdh_so_luong.min'=>'Số lượng > 0',
            'ctdh_so_luong.max'=>'Bạn chi nhập được 10 số',
            'ctdh_gia_ban.required'=>'Bạn chưa nhập giá bán',
            'ctdh_gia_ban.min'=>'Giá bán lớn hơn 1000 đồng',
            'ctdh_gia_ban.max'=>'Bạn chi nhập được 20 số'
          ]);
          $chitietdonhang->ctdh_sp_id=$request->ctdh_sp_id;
          $chitietdonhang->ctdh_dh_id=$request->ctdh_dh_id;
          $chitietdonhang->ctdh_so_luong=$request->ctdh_so_luong;
          $chitietdonhang->ctdh_gia_ban=$request->ctdh_gia_ban;
          $chitietdonhang->updated_at=$request->updated_at;
          $chitietdonhang->save();
          return redirect('admin/chitietdonhang/sua/'.$id)->with('thongbao','Sửa thành công');
      }
      public function getXoa($id){
        $chitietdonhang=ChiTietDonHang::find($id);
        $chitietdonhang->delete();
        return redirect('admin/chitietdonhang/danhsach')->with('thongbao','Xóa thành công');
      }
}
