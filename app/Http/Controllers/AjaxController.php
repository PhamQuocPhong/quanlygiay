<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Mail;

use App\SanPham;

class AjaxController extends Controller
{
 	public function index()
 	{
 		return SanPham::with('loaisanpham')->get();

 	}  
 	
}
