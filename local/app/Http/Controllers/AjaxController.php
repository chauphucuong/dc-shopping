<?php

namespace App\Http\Controllers;

use App\BinhLuan;
use App\CuocPhiVanCHuyen;
use App\DanhMucSanPham;
use App\DiaChiGiaoHang;
use App\DonHang;
use App\KhachHang;
use App\LoaiKhuyenMai;
use App\MucThue;
use App\PhieuGiamGia;
use App\PhuongXa;
use App\QuanHuyen;
use App\ThanhPho;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //Xuất danh sách các quận huyện cho thẻ select
    public function getQuanHuyen($id_tp){
        //Lấy các quận huyện thuộc id thành phố đã nhập
        $quanhuyen = QuanHuyen::where('qh_tp_id', $id_tp)->get()->toArray();

        echo "<option disabled selected style='color: #B8B8B8'>Chọn quận/huyện</option>";
        foreach ($quanhuyen as $item) {
            echo "<option value='".$item['qh_id']."'>".$item['qh_ten']."</option>";
        }
    }

    //Xuất danh sách các phường xã cho thẻ select
    public function getPhuongXa($id_qh){
        //Lấy các quận huyện thuộc id thành phố đã nhập
        $phuongxa = PhuongXa::where('px_qh_id', $id_qh)->get()->toArray();

        echo "<option disabled selected style='color: #B8B8B8'>Chọn phường/xã</option>";
        foreach ($phuongxa as $item) {
            echo "<option value='".$item['px_id']."'>".$item['px_ten']."</option>";
        }
    }

    //Xuất danh sách các địa chỉ cho thẻ select
    public function getDiaChi($id_kh){

        $diachigiaohang = DiaChiGiaoHang::where('dcgh_kh_id', $id_kh)->get()->toArray();

        echo "<option disabled selected style='color: #B8B8B8'>Chọn phường/xã</option>";
        foreach ($diachigiaohang as $item) {
            echo "<option>".$item->dcgh_dia_chi.', '.$item->dcgh_phuong_xa.', '.$item->dcgh_quan_huyen.', '.$item->dcgh_thanh_pho."</option>";
        }
    }

    //Xuất danh sách các địa chỉ cho thẻ select
    public function getTotalPGG($id_dh, $id_pgg){

        $donhang = DonHang::find($id_dh);
        $pgg     = PhieuGiamGia::find($id_pgg);
        $total   = $donhang->dh_tong_tien - $pgg->pgg_giam_gia;
        echo $total;
    }
    //Xuất danh sách các địa chỉ cho thẻ select
    public function getTotalCPVC($id_dh, $id_cpvc){

        $donhang = DonHang::find($id_dh);
        $cpvc    = CuocPhiVanCHuyen::find($id_cpvc);
        $total   = $donhang->dh_tong_tien + $cpvc->cpvc_gia_cuoc;
        echo $total;
    }

    //Xuất danh sách các địa chỉ cho thẻ select
    public function getDonHang($id_kh){
        $donhang = DonHang::where('dh_kh_id', $id_kh)->get()->toArray();
        echo "<option disabled selected style='color: #B8B8B8'>Chọn đơn hàng</option>";
        foreach ($donhang as $item) {
            echo "<option value='".$item['dh_id']."'>".$item['dh_ngay_dat_hang']."</option>";
        }
    }

    //Xuất danh sách các danh mục sản phẩm cho thẻ select
    public function getMucSanPham($dmsp_id){

        $danhmuc = DanhMucSanPham::where('parent', $dmsp_id)->get();

        foreach ($danhmuc as $item) {
            echo "<option value='".$item->dmsp_id."'>".$item->dmsp_ten."</option>";
        }
    }

    //Xuất giá bán của sản phẩm khi giá bán bị thay đổi
    public function getGiaBan($thue_id, $km_id, $gia_ban){
        $thue       = MucThue::find($thue_id);
        $khuyenmai  = LoaiKhuyenMai::find($km_id);

        $gia_ban += ($gia_ban*($thue->mt_muc_thue/100));
        $gia_ban -= ($gia_ban*($khuyenmai->km_gia/100));

        echo $gia_ban;
    }

    //Xuất giá bán của sản phẩm khi giá bán bị thay đổi
    public function getGiaBanThue($thue_id, $km_id, $gia_ban){
        $thue       = MucThue::find($thue_id);
        $khuyenmai  = LoaiKhuyenMai::find($km_id);

        $gia_ban += ($gia_ban*($thue->mt_muc_thue/100));
        $gia_ban -= ($gia_ban*($khuyenmai->km_gia/100));

        echo $gia_ban;
    }

    //Xuất giá bán của sản phẩm khi giá bán bị thay đổi
    public function getGiaBanKhuyenMai($thue_id, $km_id, $gia_ban){
        $thue       = MucThue::find($thue_id);
        $khuyenmai  = LoaiKhuyenMai::find($km_id);

        $gia_ban += ($gia_ban*($thue->mt_muc_thue/100));
        $gia_ban -= ($gia_ban*($khuyenmai->km_gia/100));

        echo $gia_ban;
    }
    //Xuất thông tin cước phí của địa chỉ giao hàng đã nhập
    public function getCuocPhi($dcgh_id, $total){
        $diachi       = DiaChiGiaoHang::find($dcgh_id);
        $cuocphi      = CuocPhiVanCHuyen::where('cpvc_tp_id',$diachi->dcgh_thanh_pho)->get();
        $thanhpho     = ThanhPho::find($diachi->dcgh_thanh_pho);
        $total       += $cuocphi[0]->cpvc_gia_cuoc;
        $strTotal     = number_format($total);
        $strCuocPhi   = number_format($cuocphi[0]->cpvc_gia_cuoc);

        return ['tp'=> $thanhpho->tp_ten ,'numberCuocPhi' => $cuocphi[0]->cpvc_gia_cuoc, 'strCuocPhi' => $strCuocPhi,
            'strTotal' => $strTotal, 'numberTotal' => $total];
    }
    //Xuất thông tin cước phí của địa chỉ giao hàng đã nhập
    public function getBinhLuan($position){

        echo "href='".url($binhluan->url($page))."'";
    }

}
