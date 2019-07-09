<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiNhanVien extends Model
{
    protected $table      = "loainhanvien";
    protected $primaryKey = "lnv_id";
    public $timestamps    = false;

    public function nhanvien(){
        return $this->hasMany("App/NhanVien");
    }
}
