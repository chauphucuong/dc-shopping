<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaikhuyenmai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaikhuyenmai', function (Blueprint $table) {
            $table->increments('km_id');
            $table->string('km_ten');
            $table->double('km_gia');
            $table->dateTime("km_ngay_bat_dau");
            $table->dateTime("km_ngay_ket_thuc");
            $table->string('trang_thai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_khuyen_mai');
    }
}
