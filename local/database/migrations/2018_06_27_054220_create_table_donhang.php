<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('dh_id');
            $table->integer('dh_kh_id')->unsigned();
            $table->integer('dh_dia_chi_id');
            $table->integer('dh_pgg_id')->unsigned();
            $table->integer('dh_ltt_id')->unsigned();
            $table->integer('dh_tinh_trang_id')->unsigned();
            $table->integer('dh_cpvc_id')->unsigned();
            $table->double("dh_tong_tien");
            $table->date("dh_ngay_dat_hang");
            $table->timestamps();

            //Khóa ngoại
            $table->foreign("dh_kh_id")->references("kh_id")->on("khachhang");
            $table->foreign("dh_cpvc_id")->references("cpvc_id")->on("cuocphivanchuyen");
            $table->foreign("dh_pgg_id")->references("pgg_id")->on("phieugiamgia");
            $table->foreign("dh_ltt_id")->references("ltt_id")->on("loaithanhtoan");
            $table->foreign("dh_tinh_trang_id")->references("tinh_trang_id")->on("tinhtrangdonhang");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
