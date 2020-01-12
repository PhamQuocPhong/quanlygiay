<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Chitiethoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->increments('ID_ChiTietHoaDon', 10)->primary;
            $table->float('DonGia', 20, 0);
            $table->integer('SoLuong');
            $table->float('ThanhTien', 20, 0);

            $table->integer('ID_SanPham')->unsigned();
            $table->integer('ID_HoaDon')->unsigned();
            $table->integer('ID_SanPham_SoLuong')->unsigned();
        });

          Schema::table('chitiethoadon', function($table) {
             $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham')->onDelete('cascade');;    
            }); 
          Schema::table('chitiethoadon', function($table) {
             $table->foreign('ID_SanPham_SoLuong')->references('ID_SanPham_SoLuong')->on('sanpham_soluong')->onDelete('cascade');;    
            }); 
              Schema::table('chitiethoadon', function($table) {
             $table->foreign('ID_HoaDon')->references('ID_HoaDon')->on('hoadon')->onDelete('cascade');;
               }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chitiethoadon');
    }

}