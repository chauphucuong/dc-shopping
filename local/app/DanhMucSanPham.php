<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucSanPham extends Model
{
    protected $table = "danhmucsanpham";
    protected $primaryKey = "dmsp_id";
    public $timestamps = false;

    //1 danh mục sản phẩm sẽ có nhiều sản phẩm
    public function sanpham(){
        return $this->hasMany("App/SanPham");
    }
}
