<?php

namespace App\Http\Controllers;

use App\HinhAnhSanPham;
use App\KichThuoc;
use App\MauSac;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\DonViTinh;
use App\DanhMucSanPham;
use App\NhaSanXuat;
use App\KhoHang;
use App\Mucthue;
use App\LoaiKhuyenMai;
use App\SanPham;
use Illuminate\Support\Facades\Validator;

class sanphamController extends Controller
{
//----------------------------------------------DANH SÁCH SẢN PHẨM------------------------------------------------------
  public function getDanhSach(){
    $sanpham = SanPham::all();
    return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]);
  }

//------------------------------------------------THÊM SẢN PHẨM---------------------------------------------------------
  public function getThem(){
    $donvitinh      = DonViTinh::all();
    $danhmucsanpham = DanhMucSanPham::where('parent', 0)->get();
    $nhasanxuat     = NhaSanXuat::all();
    $khohang        = KhoHang::all();
    $mucthue        = Mucthue::all();
    $khuyenmai      = LoaiKhuyenMai::all();
    return view('admin.sanpham.them',['donvitinh'=>$donvitinh,'danhmucsanpham'=>$danhmucsanpham,
        'nhasanxuat'=>$nhasanxuat,'khohang'=>$khohang,'mucthue'=>$mucthue,'khuyenmai'=>$khuyenmai]);
  }

  public function postThem(Request $request){
    $this->validate($request,[
      'sp_ten'                          => 'required',
      'sp_so_luong_ton_kho'             => 'required',
      'sp_gia_niem_yet'                 => 'required|min:3',
      'sp_gia_ban'                      => 'required|min:3',
      'sp_don_vi_tinh_id'               => 'required',
      'sp_danh_muc_id'                  => 'required',
      'sp_nsx_id'                       => 'required',
      'sp_kho_hang_id'                  => 'required',
      'sp_muc_thue_id'                  => 'required',
      'sp_khuyen_mai_id'                => 'required',
    ],
    [
      'sp_don_vi_tinh_id.required'      => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_danh_muc_id.required'         => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_nsx_id.required'              => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_kho_hang_id.required'         => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_muc_thue_id.required'         => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_khuyen_mai_id.required'       => 'Bạn chưa nhập tên danh mục sản phẩm',
      'sp_ten.required'                 => 'Bạn chưa nhập tên sản phẩm',
      'sp_so_luong_ton_kho.required'    => 'Bạn chưa nhập tên số lượng tồn kho',
      'sp_gia_niem_yet.required'        => 'Bạn chưa nhập giá niêm yết sản phẩm',
      'sp_gia_niem_yet.min'             => 'Giá niêm yết sản phẩm chưa đủ > 1000 đồng',
      'sp_gia_ban.min'                  =>'Giá bán sản phẩm chưa > 1000 đồng',
      'sp_gia_ban.required'             =>'Bạn chưa nhập giá bán sản phẩm',
    ]);
        $sanpham                        =   new SanPham();
        $sanpham->sp_ten                =   $request->sp_ten;
        $sanpham->sp_so_luong_ton_kho   =   $request->sp_so_luong_ton_kho;
        $sanpham->sp_gia_niem_yet       =   $request->sp_gia_niem_yet;
        $sanpham->sp_gia_ban            =   $request->sp_gia_ban;
        if(empty($request->sp_mo_ta)){
          $sanpham->sp_mo_ta            =   "";
        }else{
          $sanpham->sp_mo_ta            =   $request->sp_mo_ta;
        }
        $sanpham->sp_don_vi_tinh_id     =   $request->sp_don_vi_tinh_id;
        $sanpham->sp_danh_muc_id        =   $request->sp_danh_muc_id;
        $sanpham->sp_nsx_id             =   $request->sp_nsx_id;
        $sanpham->sp_kho_hang_id        =   $request->sp_kho_hang_id;
        $sanpham->sp_muc_thue_id        =   $request->sp_muc_thue_id;
        $sanpham->sp_khuyen_mai_id      =   $request->sp_khuyen_mai_id;
        $sanpham->trang_thai            =   $request->trang_thai;
        $sanpham->created_at            =   Carbon::now();
        $sanpham->updated_at            =   Carbon::now();
        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$sanpham->sp_id)->with('thongbao','Thêm sản phảm thành công vui 
        lòng chọn hình ảnh - màu sắc - kích thước mà sản phẩm sẽ được bán');
    }

//------------------------------------------------SỬA SẢN PHẨM----------------------------------------------------------
  public function getSua($id){
    $sanpham           = SanPham::find($id);
    $donvitinh         = DonViTinh::all();
    $oldDanhmuc        = DanhMucSanPham::find($sanpham->sp_danh_muc_id);
    $danhmucsanphamCha = DanhMucSanPham::where('parent', 0)->get();
    $danhmucsanphamCon = DanhMucSanPham::where('parent', $oldDanhmuc->parent)->get();
    $nhasanxuat        = NhaSanXuat::all();
    $khohang           = KhoHang::all();
    $mucthue           = Mucthue::all();
    $khuyenmai         = LoaiKhuyenMai::all();
    $hinhanh           = HinhAnhSanPham::where('hasp_sp_id', $id)->get();
    $kichthuoc         = KichThuoc::where('size_sp_id', $id)->get();
    return view('admin.sanpham.sua',['donvitinh'=>$donvitinh,'danhmucsanphamCha'=>$danhmucsanphamCha,
        'danhmucsanphamCon'=>$danhmucsanphamCon, 'nhasanxuat'=>$nhasanxuat,'khohang'=>$khohang,'mucthue'=>$mucthue,
        'khuyenmai'=>$khuyenmai, 'sanpham'=>$sanpham, 'hinhanh' => $hinhanh, 'kichthuoc' => $kichthuoc,
        'oldDanhmuc' => $oldDanhmuc]);
  }
  public function postSua(Request $request,$id){
    $sanpham        = SanPham::find($id);
    $this->validate($request,[
      'sp_ten'                       =>'required',
      'sp_so_luong_ton_kho'          =>'required',
      'sp_gia_niem_yet'              =>'required|min:3',
      'sp_gia_ban'                   =>'required|min:3'
    ],
    [
      'sp_ten.required'              =>'Bạn chưa nhập tên sản phẩm',
      'sp_so_luong_ton_kho.required' =>'Bạn chưa nhập tên số lượng tồn kho',
      'sp_gia_niem_yet.required'     =>'Bạn chưa nhập giá niêm yết sản phẩm',
      'sp_gia_niem_yet.min'          =>'Giá niêm yết sản phẩm chưa > 1000 đồng',
      'sp_gia_ban.min'               =>'Giá bán sản phẩm chưa > 1000 đồng',
      'sp_gia_ban.required'          =>'Bạn chưa nhập giá bán sản phẩm',

    ]);
        $sanpham->sp_ten             = $request->sp_ten;
        $sanpham->sp_so_luong_ton_kho= $request->sp_so_luong_ton_kho;
        $sanpham->sp_gia_niem_yet    = $request->sp_gia_niem_yet;
        $sanpham->sp_gia_ban         = $request->sp_gia_ban;
        if(empty($request->sp_mo_ta)){
            $sanpham->sp_mo_ta       = "";
        }else{
            $sanpham->sp_mo_ta       = $request->sp_mo_ta;
        }
        $sanpham->sp_don_vi_tinh_id  = $request->sp_don_vi_tinh_id;
        $sanpham->sp_danh_muc_id     = $request->sp_danh_muc_id;
        $sanpham->sp_nsx_id          = $request->sp_nsx_id;
        $sanpham->sp_kho_hang_id     = $request->sp_kho_hang_id;
        $sanpham->sp_muc_thue_id     = $request->sp_muc_thue_id;
        $sanpham->sp_khuyen_mai_id   = $request->sp_khuyen_mai_id;
        $sanpham->trang_thai         = $request->trang_thai;
        $sanpham->updated_at         = Carbon::now();
        $sanpham->save();
        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
    }
//------------------------------------------------XÓA SẢN PHẨM----------------------------------------------------------
    public function getXoa($id){
      $sanpham=SanPham::find($id);
      $sanpham->delete();
      return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }
//-----------------------------------------------THÊM HÌNH ẢNH----------------------------------------------------------
    public function getThemHinhAnh($sp_id){
        return view('admin.hinhanh-mausac.them', ['sp_id' => $sp_id]);
    }
    public function postThemHinhAnh(Request $request, $sp_id){
        $rules      = [
            'hasp_ten'          => 'required',
            'mau_ten'           => 'required'
        ];
        $messages   = [
            'hasp_ten.required' => 'Chưa nhập tên hình ảnh.',
            'mau_ten.required'  => 'Chưa nhập tên màu'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $hinh = new HinhAnhSanPham();
            $hinh->hasp_sp_id = $sp_id;

            if($request->hasFile('hasp_ten')){
                $file           = $request->file('hasp_ten');
                $duoi           = $file->getClientOriginalExtension();
                if($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg'){
                    return redirect()->back()->withErrors('SBạn chỉ được chọn file có đuôi jpg,png,jpeg');
                }
                $name           = $file->getClientOriginalName();
                $hasp_ten       = str_random(4).'_'.$name;
                while (file_exists('uploads/sanpham/'.$hasp_ten)){
                    $hasp_ten   = str_random(4).'_'.$name;
                }
                $file->move('uploads/sanpham', $hasp_ten);
                $hinh->hasp_ten = $hasp_ten;
            }else{
                $hinh->hasp_ten = "";
            }
            $hinh->save();

            $mau = new MauSac();
            $mau->mau_ha_id     = $hinh->id;
            $mau->mau_code      = $request->mau_code;
            $mau->mau_ten       = $request->mau_ten;
            $mau->save();

            return redirect('admin/sanpham/sua/'.$sp_id);
        }
    }

//-----------------------------------------------SỬA HÌNH ẢNH----------------------------------------------------------
    public function getSuaHinhAnh($ha_id, $mau_id, $sp_id){
        $hinh = HinhAnhSanPham::find($ha_id);
        $mau  = MauSac::find($mau_id);
        return view('admin.hinhanh-mausac.sua', ['hinhanh' => $hinh, 'mausac' => $mau, 'sp_id' => $sp_id]);
    }
    public function postSuaHinhAnh(Request $request, $ha_id, $mau_id, $sp_id){
        $rules      = ['mau_ten'           => 'required'];
        $messages   = ['mau_ten.required'  => 'Chưa nhập tên màu'];
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else {

            $hinh = HinhAnhSanPham::find($ha_id);

            if ($request->hasFile('hasp_ten')) {
                $file           = $request->file('hasp_ten');
                $duoi           = $file->getClientOriginalExtension();
                if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                    return redirect()->back()->withErrors('SBạn chỉ được chọn file có đuôi jpg,png,jpeg');
                }
                $name = $file->getClientOriginalName();
                $hasp_ten       = str_random(4) . '_' . $name;
                while (file_exists('uploads/sanpham/' . $hasp_ten)) {
                    $hasp_ten   = str_random(4) . '_' . $name;
                }
                $file->move('uploads/sanpham', $hasp_ten);
                $hinh->hasp_ten = $hasp_ten;
            }
            $hinh->save();

            $mau = MauSac::find($mau_id);
            $mau->mau_ha_id = $hinh->id;
            $mau->mau_code = $request->mau_code;
            $mau->mau_ten = $request->mau_ten;
            $mau->save();

            return redirect('admin/sanpham/sua/'.$sp_id);
        }
    }

//-----------------------------------------------XÓA HÌNH ẢNH-----------------------------------------------------------
    public function getXoaHinhAnh($ha_id, $mau_id, $sp_id){
        $hinh = HinhAnhSanPham::find($ha_id);
        $mau  = MauSac::find($mau_id);
        $mau->delete();
        $hinh->delete();
        return redirect('admin/sanpham/sua/'.$sp_id);
    }

//-----------------------------------------------THÊM KÍCH THƯỚC--------------------------------------------------------
    public function getThemKichThuoc($sp_id){
        return view('admin.kichthuoc.them', ['sp_id' => $sp_id]);
    }
    public function postThemKichThuoc(Request $request, $sp_id){

        $rules      = ['size_ten' => 'required|unique:kichthuoc,size_ten'];
        $messages   = [
            'size_ten.required'   => 'Chưa nhập tên kích thước',
            'size_ten.unique'     => 'Tên size đã tồn tại'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            $kichthuoc             = new KichThuoc();
            $kichthuoc->size_sp_id = $sp_id;
            $kichthuoc->size_ten   = $request->size_ten;
            $kichthuoc->save();
            return redirect('admin/sanpham/sua/'.$sp_id);
        }
    }

//-----------------------------------------------SỬA KÍCH THƯỚC---------------------------------------------------------
    public function getSuaKichThuoc($kt_id, $sp_id){
        $kichthuoc = KichThuoc::find($kt_id);
        return view('admin.kichthuoc.sua', ['sp_id' => $sp_id, 'kichthuoc' => $kichthuoc]);
    }
    public function postSuaKichThuoc(Request $request, $kt_id, $sp_id){

        $kichthuoc  = KichThuoc::find($kt_id);

        $rules      = ['size_ten' => 'required|unique:kichthuoc,size_ten'];
        $messages   = [
            'size_ten.required'   => 'Chưa nhập tên kích thước',
            'size_ten.unique'     => 'Tên size đã tồn tại'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            if($request->size_ten == $kichthuoc->size_ten) {
                return redirect('admin/sanpham/sua/'.$sp_id);
            }else{
                return redirect()->back()->withErrors($validator);
            }
        }else{

            $kichthuoc->size_ten   = $request->size_ten;
            $kichthuoc->save();
            return redirect('admin/sanpham/sua/'.$sp_id);
        }
    }

//-----------------------------------------------XÓA KÍCH THƯỚC---------------------------------------------------------
    public function getXoaKichThuoc($kt_id, $sp_id){
        $kichthuoc = KichThuoc::find($kt_id);
        $kichthuoc->delete();
        return redirect('admin/sanpham/sua/'.$sp_id);
    }

}
