<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table      = 'phuongxa';
    protected $primaryKey = 'px_id';
    public $timestamps    = false;

    //1 phường/xã thuộc về 1 quận/huyện
    public function quanhuyen(){
        return $this->belongsTo('App/QuanHuyen');
    }
}
