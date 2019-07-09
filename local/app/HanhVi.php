<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HanhVi extends Model
{
    protected $table = 'hanhvi';
    protected $primaryKey = 'hv_id';

    //1 hành vi thuộc về 1 khách hàng
    public function khachhang(){
        return $this->belongsTo('App/KhachHang');
    }

    //1 hành vi thuộc về 1 sản phẩm
    public function sanpham(){
        return $this->belongsTo('App/SanPham');
    }
}
