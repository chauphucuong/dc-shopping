<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiaChiGiaoHang extends Model
{
    protected $table = "diachigiaohang";
    protected $primaryKey = "dcgh_id";
    public $timestamps = false;

    //1 địa chỉ giao hàng thuộc về 1 khách hàng
    public function khachhang(){
        return $this->belongsTo("App/KhachHang");
    }
    //1 địa chỉ giao hàng có thể có nhiều đơn hàng
    public function diachigiaohang(){
        return $this->hasMany("App/DiaChiGiaoHang");
    }
}
