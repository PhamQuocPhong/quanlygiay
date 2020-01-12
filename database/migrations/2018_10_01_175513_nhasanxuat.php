<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhasanxuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('nhasanxuat', function (Blueprint $table) {
            $table->increments('ID_NhaSanXuat', 10)->primary;
            $table->string('TenNhaSanXuat', 100);         

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::dropIfExists('nhasanxuat');
    }
}
