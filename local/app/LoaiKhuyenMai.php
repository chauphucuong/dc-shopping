<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiKhuyenMai extends Model
{
    protected $table = "loaikhuyenmai";
    protected $primaryKey = "km_id";
    public $timestamps = false;

    //1 loại khuyến mãi áp dụng cho nhiều sản phẩm
    public function khohang(){
        return $this->hasMany("App/SanPham");
    }
}
