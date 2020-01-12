<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Danhgia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('danhgia', function (Blueprint $table) {
            $table->increments('ID_DanhGia', 10)->primary;
            $table->integer('Rating');
            $table->string('NoiDung', 500)->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('ID_SanPham')->unsigned();
            $table->timestamps();
        });

          Schema::table('danhgia', function($table) {
        $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham')->onDelete('cascade');;
        });

         Schema::table('danhgia', function($table) {
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('danhgia');
    }
}