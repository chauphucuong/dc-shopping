<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCuocphivanchuyen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuocphivanchuyen', function (Blueprint $table) {
            $table->increments('cpvc_id');
            $table->integer('cpvc_tp_id')->unsigned();
            $table->double("cpvc_gia_cuoc");

            //Khóa ngoại
            $table->foreign('cpvc_tp_id')->references('tp_id')->on('thanhpho');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuocphivanchuyen');
    }
}
