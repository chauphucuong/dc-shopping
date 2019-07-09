<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhieuGiaoHang extends Model
{
    protected $table      = 'phieugiaohang';
    protected $primaryKey = 'pgh_id';
    public $timestamps    = false;

    //1 phiếu giao hàng thuộc về 1 đơn hàng
    public function donhang(){
        return $this->belongsTo('App/DonHang');
    }

    //1 phiếu giao hàng do 1 nhân viên phụ trách
    public function nhanvien(){
        return $this->belongsTo('App/NhanVien');
    }
}
