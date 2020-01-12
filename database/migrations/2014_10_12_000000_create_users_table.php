<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->primary;
            $table->string('email', 50)->unique();
            $table->string('password', 255);
            $table->string('HoTen', 50)->nullable();
            $table->integer('GioiTinh')->nullable();
            $table->string('DienThoai', 20)->nullable();
            $table->string('DiaChi', 500)->nullable();
            $table->string('Tinh', 100)->nullable();
            $table->string('Huyen', 100)->nullable();
            $table->string('Xa', 100)->nullable();
            $table->date('NgaySinh')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
