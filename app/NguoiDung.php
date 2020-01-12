<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = "users";
    public $timestamps = true;


    public function hoadon(){
        return $this->hasMany('App\Order');
    }

    
}
