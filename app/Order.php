<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "hoadon";
    public $timestamps = true;

     public function nguoidung(){
         return $this->beLongsTo('App\NguoiDung','name');		
   } 
}
