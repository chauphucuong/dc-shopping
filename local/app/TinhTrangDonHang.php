<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhTrangDonHang extends Model
{
    protected $table      = "tinhtrangdonhang";
    protected $primaryKey = "tinh_trang_id";
    public $timestamps    = false;

    //1 tình trạng được dùng cho nhiều đơn hàng
    public function donhang(){
        return $this->hasMany("App/DonHang");
    }

    //1 tình trạng được dùng cho nhiều đơn hàng đổi/ trả
    public function donhangdoi_tra(){
        return $this->hasMany("App/DonHangDoi_Tra");
    }
}
