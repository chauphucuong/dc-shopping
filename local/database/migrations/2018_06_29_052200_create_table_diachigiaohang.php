<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDiachigiaohang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diachigiaohang', function (Blueprint $table) {
            $table->increments("dcgh_id");
            $table->integer('dcgh_kh_id')->unsigned();
            $table->string('dcgh_dia_chi');
            $table->string('dcgh_phuong_xa');
            $table->string('dcgh_quan_huyen');
            $table->string('dcgh_thanh_pho');

            //Khóa ngoại
            $table->foreign("dcgh_kh_id")->references("kh_id")->on("khachhang");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diachigiaohang');
    }
}
