<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHinhanhsanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhsanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hasp_sp_id')->unsigned();
            $table->string('hasp_ten');

            //Khóa ngoại
            $table->foreign('hasp_sp_id')->references('sp_id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanhsanpham');
    }
}
