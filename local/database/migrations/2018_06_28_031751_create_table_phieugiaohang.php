<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhieugiaohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieugiaohang', function (Blueprint $table) {
            $table->increments('pgh_id');
            $table->integer('pgh_dh_id')->unsigned();
            $table->integer('pgh_nv_id')->unsigned();
            $table->date('pgh_ngay_giao_hang');
            $table->integer('pgh_tinh_trang_id')->unsigned();

            //Khóa ngoại
            $table->foreign("pgh_dh_id")->references("dh_id")->on("donhang");
            $table->foreign("pgh_nv_id")->references("nv_id")->on("nhanvien");
            $table->foreign("pgh_tinh_trang_id")->references("tinh_trang_id")->on("tinhtrangdonhang");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieugiaohang');
    }
}
