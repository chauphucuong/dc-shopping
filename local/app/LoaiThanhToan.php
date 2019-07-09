<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiThanhToan extends Model
{
    protected $table      = "loaithanhtoan";
    protected $primaryKey = "ltt_id";
    public $timestamps    = false;

    //1 loại thanh toán có thể áp dụng cho nhiều đơn hàng
    public function donhang(){
        return $this->hasMany("App/DonHang");
    }
}
