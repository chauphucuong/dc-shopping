<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDonhangdoiTra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhangdoi_tra', function (Blueprint $table) {
            $table->increments('dhdt_id');
            $table->integer('dhdt_kh_id')->unsigned();
            $table->integer('dhdt_dh_id')->unsigned();
            $table->dateTime('dhdt_ngay_doi/tra');
            $table->string('dhdt_thao_tac');
            $table->string('dhdt_ly_do');
            $table->integer('dhdt_tinh_trang_id')->unsigned();
            $table->timestamps();

            //Khóa ngoại
            $table->foreign("dhdt_kh_id")->references("kh_id")->on("khachhang");
            $table->foreign("dhdt_dh_id")->references("dh_id")->on("donhang");
            $table->foreign("dhdt_tinh_trang_id")->references("tinh_trang_id")->on("tinhtrangdonhang");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhangdoi_tra');
    }
}
