<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MucThue extends Model
{
    protected $table      = "mucthue";
    protected $primaryKey = "mt_id";

    //1 mức thuế thuộc 1 loại thuế
    public function loaithue(){
        return $this->belongsTo("App/LoaiThue");
    }

    //1 mức thuế áp dụng cho nhiều sản phẩm
    public function sanpham(){
        return $this->hasMany("App/SanPham");
    }
}
