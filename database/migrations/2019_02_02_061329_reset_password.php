<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ResetPassword extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reset_password', function (Blueprint $table) {
            $table->increments('id_reset_password')->primary;
            $table->string('Token', 100);
            $table->dateTime('ThoiGianTao')->nullable();
            $table->integer('Check');
            $table->integer('user_id')->unsigned();

        });

        Schema::table('reset_password', function($table) {
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
          Schema::dropIfExists('reset_password');
    }
}
