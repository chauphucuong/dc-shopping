<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMausac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mausac', function (Blueprint $table) {
            $table->increments('mau_id');
            $table->integer('mau_ha_id')->unsigned();
            $table->string('mau_code');
            $table->string('mau_ten');

            //Khóa ngoại
            $table->foreign("mau_ha_id")->references("id")->on("hinhanhsanpham");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mausac');
    }
}
