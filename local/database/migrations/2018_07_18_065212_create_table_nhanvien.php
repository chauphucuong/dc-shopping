<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNhanvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('nv_id');
            $table->integer("nv_lnv_id")->unsigned();
            $table->string("nv_ten");
            $table->integer("nv_sdt");
            $table->string("nv_dia_chi");
            $table->string("nv_email");
            $table->integer("nv_so_ngay_nghi");
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('nv_lnv_id')->references('lnv_id')->on('loainhanvien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhanvien');
    }
}
