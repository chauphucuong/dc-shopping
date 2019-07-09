<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    protected $table        = "khohang";
    protected $primaryKey   = "khohang_id";
    public $timestamps      = false;

    //1 kho hàng có nhiều sản phẩm
    public function sanpham(){
        return $this->hasMany("App/SanPham");
    }
}
