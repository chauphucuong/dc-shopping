<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->increments('tt_id');
            $table->integer("tt_ltt_id")->unsigned();
            $table->string("tt_hinh_anh");
            $table->string("tt_tieu_de");
            $table->string("tt_mo_ta");
            $table->string("tt_noi_dung");
            $table->string("trang_thai");
            $table->timestamps();

            //Khóa ngoại
            $table->foreign('tt_ltt_id')->references('dmtt_id')->on('danhmuctintuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
}
