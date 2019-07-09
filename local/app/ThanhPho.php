<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThanhPho extends Model
{
    protected $table        = "thanhpho";
    protected $primaryKey   = "tp_id";
    public $timestamps      = false;

    //1 thành phố sẽ có 1 cước phí vận chuyển
    public function cuocphivanchuyen(){
        return $this->hasOne("App/CuocPhiVanChuyen");
    }

    //1 thành phố có nhiều quận/huyện
    public function quanhuyen(){
        return $this->hasMany('App/QuanHuyen');
    }
}
