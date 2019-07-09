<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHangDoi_Tra extends Model
{
    protected $table = "donhangdoi_tra";
    protected $primaryKey = "dhdt_id";

    //1 đơn hàng đổi/ trả thuộc 1 đơn hàng
    public function donhang(){
        return $this->belongsTo("App/DonHang");
    }

    //1 đơn hàng đổi/ trả thuộc 1 khách hàng
    public function khachhang(){
        return $this->belongsTo("App/KhachHang");
    }

    //1 đơn hàng đổi/ trả thuộc 1 tình trạng
    public function tinhtrangdonhang(){
        return $this->belongsTo("App/TinhTrangDonHang");
    }
}
