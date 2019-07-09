<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKichthuoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kichthuoc', function (Blueprint $table) {
            $table->increments('size_id');
            $table->integer('size_sp_id')->unsigned();
            $table->string('size_ten');

            //Khóa ngoại
            $table->foreign('size_sp_id')->references('sp_id')->on('sanpham');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kichthuoc');
    }
}
