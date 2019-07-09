<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = "donhang";
    protected $primaryKey = "dh_id";

    //1 đơn hàng có thể có nhiều chi tiết đơn hàng
    public function chitietdonhang(){
        return $this->hasMany("App/ChiTietDonHang");
    }

    //1 đơn hàng chỉ được dùng 1 phiếu giảm giá
    public function phieugiamgia(){
        return $this->belongsTo("App/PhieuGiamGia");
    }

    //1 đơn hàng có 1 loại thanh toán
    public function loaithanhtoan(){
        return $this->belongsTo("App/LoaiThanhToan");
    }

    //1 đơn hàng có 1 tình trạng
    public function tinhtrangdonhang(){
        return $this->belongsTo("App/TinhTrangDonHang");
    }

    //1 đơn hàng có thể có 1 đơn hàng đổi/ trả
    public function donhangdoi_tra(){
        return $this->hasOne("App/DonHangDoi_Tra");
    }
    //1 đơn hàng có 1 phiếu giao hàng
    public function phieugiaohang(){
        return $this->hasOne("App/PhieuGiaoHang");
    }

    //1 đơn hàng thuộc về 1 khách hàng
    public function khachhang(){
        return $this->belongsTo("App/KhachHang");
    }

    //1 đơn hàng có 1 cước phí vận chuyển
    public function cuocphivanchuyen(){
        return $this->belongsTo("App/CuocPhiVanChuyen");
    }
    //1 đơn hàng có thuộc về 1 địa chỉ giao hàng
    public function diachigiaohang(){
        return $this->belongsTo("App/DiaChiGiaoHang");
    }
}
