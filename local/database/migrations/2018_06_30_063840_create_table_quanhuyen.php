<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuanhuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quanhuyen', function (Blueprint $table) {
            $table->increments('qh_id');
            $table->integer('qh_tp_id')->unsigned();
            $table->string('qh_ten');
            $table->string('trang_thai');

            //Khóa ngoại
            $table->foreign('qh_tp_id')->references('tp_id')->on('thanhpho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quanhuyen');
    }
}
