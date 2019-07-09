<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhuongxa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phuongxa', function (Blueprint $table) {
            $table->increments('px_id');
            $table->integer('px_qh_id')->unsigned();
            $table->string('px_ten');
            $table->string('trang_thai');

            //Khóa ngoại
            $table->foreign('px_qh_id')->references('qh_id')->on('quanhuyen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phuongxa');
    }
}
