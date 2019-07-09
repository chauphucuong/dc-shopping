<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    protected $table = "donvitinh";
    protected $primaryKey = "donvitinh_id";

    //1 đơn vị tính áp dụng cho nhiều sản phẩm
    public function sanpham(){
        return $this->hasMany("App/SanPham");
    }
}
