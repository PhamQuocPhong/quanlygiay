<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DanhGia;

class DanhGiaController extends Controller
{
   public function index(Request $request)
   {	
      	$content = $request->comment;
      	$rating = $request->rating;
      	$id_sanpham = $request->id_sanpham;
      	$user_id = $request->user_id;

      	$danhgia = new DanhGia();

      	$danhgia->Rating = $rating;
      	$danhgia->NoiDung = $content;
      	$danhgia->user_id = $user_id;
      	$danhgia->ID_SanPham = $id_sanpham;
      	$danhgia->save();  	

        return back()->with('review_success', 'Bạn vừa đánh giá sản phẩm này!');
     }

}
