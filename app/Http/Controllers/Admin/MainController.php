<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\SanPham;

class MainController extends Controller
{
   public function __construct()
    {
    }

    public function index()
    {
    
        	 return view('admin.master');
    	
    }
}
