<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiSanPhamController extends Controller
{
    public function index(){
        $nguoidung = DB::table('nguoidung')->get();
   
        return view('master', ['nguoidung' => $nguoidung]);
      }
}
