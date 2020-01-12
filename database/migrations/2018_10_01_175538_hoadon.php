<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Hoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('hoadon', function (Blueprint $table) {
            $table->increments('ID_HoaDon', 10)->primary;
            $table->dateTime('NgayLap')->nullable();
            $table->float('TongTien', 20, 0);
            $table->integer('Status');

            $table->integer('user_id')->unsigned();

        });

          Schema::table('hoadon', function($table) {
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
               }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
}
