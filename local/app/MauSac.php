<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MauSac extends Model
{
    protected $table = 'mausac';
    protected $primaryKey = 'mau_id';
    public $timestamps = false;

    //1 màu sắc thuộc về 1 hình ảnh sảnh phẩm
    public function hinhanhsanpham(){
        return $this->belongsTo("App/HinhAnhSanPham");
    }
}
