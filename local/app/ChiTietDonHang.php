<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    protected $table = "chitietdonhang";
    protected $primaryKey = "ctdh_id";

    //1 chi tiết đơn hàng thuộc về 1 đơn hàng
    public function donhang()
    {
        return $this->belongsTo("App/DonHang");
    }

    //1 chi tiết đơn hàng thuộc về 1 sản phẩm
    public function sanpham()
    {
        return $this->belongsTo("App/SanPham");
    }
}
