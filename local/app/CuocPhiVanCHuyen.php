<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuocPhiVanCHuyen extends Model
{
    protected $table = "cuocphivanchuyen";
    protected $primaryKey = "cpvc_id";
    public $timestamps = false;

    //1 loại cước phí sẽ áp dụng nhiều đơn hàng
    public function donhang()
    {
        return $this->hasMany("App/DonHang");
    }

    //1 cước phí vận chuyển chỉ dành cho 1 thành phố
    public function thanhpho()
    {
        return $this->belongsTo("App/ThanhPho");
    }
}
