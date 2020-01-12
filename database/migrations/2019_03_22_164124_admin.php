<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Admin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('email', 100);
            $table->string('password', 255);
            $table->string('HoTen', 50)->nullable();
            $table->string('DiaChi', 500)->nullable();
            $table->integer('GioiTinh')->nullable();
            $table->timestamps();

            $table->primary('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('admins');
    }
}
