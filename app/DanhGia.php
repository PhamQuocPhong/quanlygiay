<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = "danhgia";
    public $timestamps = true;

    public function sanpham(){
        return $this->belongsTo('App\SanPham', 'ID_SanPham');
    }

    public function nguoidung(){
         return $this->beLongsTo('App\NguoiDung','name');		
   } 
        
}
