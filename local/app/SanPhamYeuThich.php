<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPhamYeuThich extends Model
{
    protected $table = 'sanphamyeuthich';
    protected $primaryKey = 'spyt_id';

    public $timestamps = false;
    //1 sản phẩm yêu thích thuộc về 1 khách hàng
    public function khachhang(){
        return $this->belongsTo('App/KhachHang');
    }

    //1 sản phẩm yêu thích thuộc về 1 sản phẩm
    public function sanpham(){
        return $this->belongsTo('App/SanPham');
    }
}
