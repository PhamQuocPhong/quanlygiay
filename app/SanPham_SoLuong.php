<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham_SoLuong extends Model
{
   protected $table = "sanpham_soluong";
   public $timestamps = false;

    public function sanpham()
    {
    	 return $this->beLongsTo('App\SanPham');
    }
}
