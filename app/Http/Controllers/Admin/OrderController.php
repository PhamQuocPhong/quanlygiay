<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Order;
use Session;
class OrderController extends Controller
{
   public function __construct()
    {

    }

    public function index()
    {

            $orders =  DB::table('hoadon')
            ->join('users', 'hoadon.user_id', '=', 'users.id')
            ->get();
          return view('admin.order', ['orders' => $orders]);
    
        
        
    
    }
}
