<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBinhluan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('bl_id');
            $table->integer('bl_kh_id')->unsigned();
            $table->integer('bl_sp_id')->unsigned();
            $table->string('bl_noi_dung');
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('bl_kh_id')->references('kh_id')->on('khachhang');
            $table->foreign('bl_sp_id')->references('sp_id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
