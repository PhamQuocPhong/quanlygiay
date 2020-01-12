
<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Loaisanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->string('MaLoaiSP', 10);
            $table->string('TenMaLoai', 100);
            $table->string('MoTa', 300)->nullable();

            $table->integer('ID_NhaSanXuat')->unsigned();
            
            $table->primary('MaLoaiSP');
        });

          Schema::table('loaisanpham', function($table) {
             $table->foreign('ID_NhaSanXuat')->references('ID_NhaSanXuat')->on('nhasanxuat')->onDelete('cascade');;
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loaisanpham');
    }
}