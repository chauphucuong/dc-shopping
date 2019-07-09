<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChitietdonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->increments('ctdh_id');
            $table->integer("ctdh_sp_id")->unsigned();
            $table->integer("ctdh_dh_id")->unsigned();
            $table->integer("ctdh_so_luong");
            $table->double("ctdh_gia_ban");
            $table->string('ghi_chu');
            $table->timestamps();

            //Khóa ngoại
            $table->foreign("ctdh_sp_id")->references("sp_id")->on("sanpham");
            $table->foreign("ctdh_dh_id")->references("dh_id")->on("donhang");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_don_hang');
    }
}
