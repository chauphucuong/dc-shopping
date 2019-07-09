<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuGiamGia extends Model
{
    protected $table      = "phieugiamgia";
    protected $primaryKey = "pgg_id";
    public $timestamps    = false;

    //1 phiếu giảm giá chỉ áp dụng cho 1 đơn hàng
    public function donhang(){
        return $this->hasOne("App/DonHang");
    }
}
