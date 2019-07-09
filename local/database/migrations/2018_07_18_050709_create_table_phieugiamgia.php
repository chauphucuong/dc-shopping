<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhieugiamgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phieugiamgia', function (Blueprint $table) {
            $table->increments('pgg_id');
            $table->string("pgg_ten");
            $table->double("pgg_giam_gia(%)");
            $table->dateTime("ngay_bat_dau");
            $table->dateTime("ngay_ket_thuc");
            $table->string("trang_thai");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phieu_giam_gia');
    }
}
