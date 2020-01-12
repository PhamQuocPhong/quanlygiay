<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NhaSanXuatTableSeeder::class);
        $this->call(NguoiDungTableSeeder::class);
        $this->call(LoaiSanPhamTableSeeder::class);
        $this->call(SanPhamTableSeeder::class);
        $this->call(SanPhamSoLuongTableSeeder::class);
        $this->call(DanhGiaSanPhamTableSeeder::class);
    }
}

class NhaSanXuatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('nhasanxuat')->insert([
			['ID_NhaSanXuat' => 1, 'TenNhaSanXuat' => 'Adidas'],
            ['ID_NhaSanXuat' => 2, 'tenloaisp' => 'Nike'],
            ['iID_NhaSanXuatd' => 3, 'tenloaisp' => 'Converse']
		]);

    }
}


class NguoiDungTableSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    }
}

class LoaiSanPhamTableSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
    }
}


class SanPhamTableSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
    }
}

class SanPhamSoLuongTableSeeder extends Seeder
{
	 /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
    }
}

class DanhGiaSanPhamTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
    }
}
