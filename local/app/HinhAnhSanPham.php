<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HinhAnhSanPham extends Model
{
    protected $table = 'hinhanhsanpham';
    protected $primaryKey = 'id';
    public $timestamps = false;

    //1 hình ảnh sản phẩm thuộc về 1 sản phẩm
    public function sanpham(){
        return $this->belongsTo('App/SanPham');
    }

    //1 sản phẩm (hình ảnh) có thể bán với nhiều màu sắc
    public function mausac(){
        return $this->hasMany("App/MauSac");
    }
}
