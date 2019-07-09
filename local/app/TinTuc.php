<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    protected $table = "tintuc";
    protected $primaryKey = "tt_id";

    //1 tin tức thuộc về 1 danh mục tin tức
    public function danhmuctintuc(){
        return $this->belongsTo("App/DanhMucTinTuc");
    }
}
