<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMucthue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mucthue', function (Blueprint $table) {
            $table->increments('mt_id');
            $table->string("mt_ten");
            $table->integer("mt_muc_thue(%)");
            $table->integer("mt_loai_thue")->unsigned();
            $table->foreign("mt_loai_thue")->references("loai_thue_id")->on("loaithue");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muc_thue');
    }
}
