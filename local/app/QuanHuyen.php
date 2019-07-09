<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanHuyen extends Model
{
    protected $table      = 'quanhuyen';
    protected $primaryKey = 'qh_id';
    public $timestamps    = false;

    //1 quận huyện thuộc về 1 thành phố
    public function thanhpho(){
        return $this->belongsTo('App/ThanhPho');
    }

    //1 quận huyện có nhiều phường/xã
    public function phuongxa(){
        return $this->hasMany('App/PhuongXa');
    }
}
