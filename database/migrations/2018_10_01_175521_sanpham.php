<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('ID_SanPham')->primary;
            $table->string('TenSanPham', 100);
            $table->string('MoTa', 3000);
            $table->float('Gia', 20, 0);
            $table->string('HinhAnh', 200);
            $table->dateTime('NgayNhap');
            $table->integer('LuotDanhGia')->default(0)->nullable();
            $table->integer('LuotMua')->default(0)->nullable();
            $table->string('MaLoaiSP', 10)->notnull();

        });

             Schema::table('sanpham', function($table) {
             $table->foreign('MaLoaiSP')->references('MaLoaiSP')->on('loaisanpham')->onDelete('cascade');;
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}