<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KichThuoc extends Model
{
    protected $table      = 'kichthuoc';
    protected $primaryKey = 'size_id';
    public $timestamps    = false;

    //1 kích thước thuộc về 1 sản phẩm
    public function sanpham(){
        return $this->belongsTo("App/SanPham");
    }
}
