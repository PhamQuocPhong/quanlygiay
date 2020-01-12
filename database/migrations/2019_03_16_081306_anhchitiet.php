<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Anhchitiet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anhchitiet', function (Blueprint $table) {
            $table->increments('ID_HinhAnh', 10)->primary;
            $table->string('HinhAnh', 200);
            $table->integer('ID_SanPham')->unsigned();

        });

        Schema::table('anhchitiet', function($table) {
             $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham');    
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anhchitiet');
    }
}
