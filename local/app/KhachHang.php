<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = "khachhang";
    protected $primaryKey = "kh_id";

    //1 khách hàng có thể có nhiều đơn hàng
    public function donhang(){
        return $this->hasMany("App/DonHang");
    }

    //1 khách hàng có thể có nhiều đơn hàng đổi/ trả
    public function donhangdoi_tra(){
        return $this->hasMany("App/DonHangDoi_Tra");
    }

    //1 khách hàng có thể có nhiều địa chỉ giao hàng
    public function diachigiaohang(){
        return $this->hasMany("App/DiaChiGiaoHang");
    }

    //1 khách có thể có nhiều bình luận
    public function binhluan(){
        return $this->hasMany('App/BinhLuan');
    }

    //1 khách có thể có nhiều hành vi
    public function hanhvi(){
        return $this->hasMany('App/HanhVi');
    }

    //1 khách có thể có nhiều sản phẩm yêu thích
    public function sanphamyeuthich(){
        return $this->hasMany('App/SanPhamYeuThich');
    }
}
