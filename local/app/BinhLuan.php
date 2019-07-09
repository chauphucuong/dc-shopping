<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = "binhluan";
    protected $primaryKey = 'bl_id';

    //1 bình luận thuộc về 1 khách hàng
    public function khachhang()
    {
        return $this->belongsTo('App/KhachHang');
    }

    //1 bình luận thuộc về 1 sản phẩm
    public function sanpham()
    {
        return $this->belongsTo('App/SanPham');
    }
}
