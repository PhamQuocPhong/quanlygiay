<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\NguoiDung;
use Illuminate\Support\Facades\DB;
use Session;

class CustomerController extends Controller
{
	public function index(){

	
    	$accounts = NguoiDung::get();

		return view('admin.customer', ['accounts' => $accounts]);  
		
	}

	public function Del(Request $request)
	{
		$email = $request->email;

		$customer = NguoiDung::where('email', $email);

		$customer->delete();
	}

}
