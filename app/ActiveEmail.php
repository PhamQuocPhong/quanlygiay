<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveEmail extends Model
{
    protected $table = "active_email";
    public $timestamps = true;

     public function nguoidung(){
         return $this->beLongsTo('App\NguoiDung','name');		
   } 
}
