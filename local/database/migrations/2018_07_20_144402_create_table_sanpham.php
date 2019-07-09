<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('sp_id');
            $table->string('sp_ten');
            $table->integer('sp_so_luong_ton_kho');
            $table->double('sp_gia_niem_yet');
            $table->double('sp_gia_ban');
            $table->string('sp_mo_ta');
            $table->integer('sp_don_vi_tinh_id')->unsigned();
            $table->integer('sp_danh_muc_id')->unsigned();
            $table->integer('sp_nsx_id')->unsigned();
            $table->integer('sp_kho_hang_id')->unsigned();
            $table->integer('sp_muc_thue_id')->unsigned();
            $table->integer('sp_khuyen_mai_id')->unsigned();
            $table->string('trang_thai');
            $table->timestamps();

            //Khóa ngoại
            $table->foreign("sp_don_vi_tinh_id")->references("donvitinh_id")->on("donvitinh");
            $table->foreign("sp_danh_muc_id")->references("dmsp_id")->on("danhmucsanpham");
            $table->foreign("sp_nsx_id")->references("nsx_id")->on("nhasanxuat");
            $table->foreign("sp_kho_hang_id")->references("khohang_id")->on("khohang");
            $table->foreign("sp_muc_thue_id")->references("mt_id")->on("mucthue");
            $table->foreign("sp_khuyen_mai_id")->references("km_id")->on("loaikhuyenmai");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('san_pham');
    }
}
