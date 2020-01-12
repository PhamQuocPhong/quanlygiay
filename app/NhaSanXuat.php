<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table = "nhasanxuat";
    public $timestamps = false;

    public function loaisanpham(){
        return $this->hasMany('App\LoaiSanPham');
    }


}
