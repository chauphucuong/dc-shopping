<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaithanhtoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaithanhtoan', function (Blueprint $table) {
            $table->increments('ltt_id');
            $table->string("ltt_ten");
            $table->string("ltt_hinh_anh");
            $table->string("trang_thai");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loai_thanh_toan');
    }
}
