<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHanhvi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hanhvi', function (Blueprint $table) {
            $table->increments('hv_id');
            $table->integer('hv_kh_id')->unsigned();
            $table->integer('hv_sp_id')->unsigned();
            $table->string('hv_so_lan_xem');
            $table->string('hv_rating');
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('hv_kh_id')->references('kh_id')->on('khachhang');
            $table->foreign('hv_sp_id')->references('sp_id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hanhvi');
    }
}
