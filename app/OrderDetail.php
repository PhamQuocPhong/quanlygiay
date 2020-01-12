<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "chitiethoadon";
    public $timestamps = true;

    public function sanpham(){
         return $this->beLongsTo('App\SanPham','ID_SanPham');		
   }
    public function hoadon(){
         return $this->beLongsTo('App\Order','ID_HoaDon');		
   }  
}
