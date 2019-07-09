<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMucTinTuc extends Model
{
    protected $table = "danhmuctintuc";
    protected $primaryKey = "dmtt_id";
    public $timestamps = false;

    //1 danh mục tin tức có nhiều tin tức
    public function tintuc(){
        return $this->hasMany("App/TinTuc");
    }
}
