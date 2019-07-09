<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table      = "nhasanxuat";
    protected $primaryKey = "nsx_id";
    public $timestamps    = false;

    //1 nhà sản xuất có nhiều sản phẩm
    public function sanpham(){
        return $this->hasMany("App/SanPham");
    }
}
