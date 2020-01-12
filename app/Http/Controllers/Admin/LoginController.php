<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function __construct()
    {
    }

    public function index()
    {
    
        return view('admin.login');
    	
    }

    public function ActionLogin(Request $request)
    {	

    	 $request->session()->put('admin', 'logined');

    	   $email = $request->email;

	        $password = $request->password;

	        $login = ['email' => $email, 'password' => $password];

	        if(Auth::guard('admin')->attempt($login)){

               $admin =  Admin::where('email', $email)->first();

               $request->session()->put('admin', 'logined');
               
               $request->session()->put('name', $admin->HoTen );

	            return redirect()->intended('admin/dashboard');
	               
	        }

	        else{
	            return view('admin.login', ['error' => 'Đăng nhập k thành công']);
	        }
    }

    public function ActionLogout(Request $request)
    {
         $request->session()->forget('admin');
        $request->session()->forget('name');

        return redirect()->intended('admin/login');
    }
}
