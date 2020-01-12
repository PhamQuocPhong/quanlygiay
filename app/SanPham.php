<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LoaiSanPham;

class SanPham extends Model
{
    protected $table = "sanpham";
    public $timestamps = false;
 
   public function loaisanpham(){
         return $this->beLongsTo('App\LoaiSanPham', 'MaLoaiSP', 'MaLoaiSP');		
   } 
    public function danhgia(){
        return $this->hasMany('App\DanhGia', 'ID_SanPham');
    }

    public function sanpham_soluong()
    {
    	 return $this->hasMany('App\SanPham_SoLuong', 'ID_SanPham');
    }

   
}
