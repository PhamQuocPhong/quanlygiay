<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SanphamSoluong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_soluong', function (Blueprint $table) {
            $table->increments('ID_SanPham_SoLuong')->primary;
            $table->integer('KichCo');
            $table->integer('SoLuong')->default(0);

            $table->integer('ID_SanPham')->unsigned();

        });

         Schema::table('sanpham_soluong', function($table) {
         $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham_soluong');
    }
}

