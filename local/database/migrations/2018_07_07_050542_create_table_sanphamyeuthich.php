<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanphamyeuthich extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamyeuthich', function (Blueprint $table) {
            $table->increments('spyt_id');
            $table->integer('spyt_kh_id')->unsigned();
            $table->integer('spyt_sp_id')->unsigned();

            //Khóa ngoại
            $table->foreign('spyt_kh_id')->references('kh_id')->on('khachhang');
            $table->foreign('spyt_sp_id')->references('sp_id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphamyeuthich');
    }
}
