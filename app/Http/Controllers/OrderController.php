<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SanPham;
use App\User;
use Cart;
use Session;
use App\Order;
use App\SanPham_SoLuong;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
       
    	if(!empty(Session::get('user_id')))           
    	{

            if(!empty(Cart::count()))
            {
                $product_cart = Cart::content();

                $user = User::where('id', Session::get('user_id'))->first();          

                return view('user.checkout', ['product_cart' => $product_cart, 'user' => $user]);
            }
            
            else{
                return redirect()->back();
            }
    	}

    	else
    	{
    		return redirect()->route('/');
    	}
    }

    public function Payment(Request $request)
    {

        $note = $request->note;

        $user_id = Session::get('user_id');

        $total =   filter_var(Cart::total(0), FILTER_SANITIZE_NUMBER_INT);

        if($total > 0)
        {
            $time_now = Carbon::now('Asia/Ho_Chi_Minh');

            $id_order = DB::table('hoadon')->insertGetId(['NgayLap' => $time_now, 'TongTien' => $total, 'Status' => 0, 'user_id' => $user_id]);

             foreach (Cart::content() as $key => $value) {

            $id_product = $value->id;
            $single_price = $value->price;
            $quantity = $value->qty;

            $size = $value->options->size;  

            $stock = DB::table('sanpham_soluong')->where([['ID_SanPham', '=' , $id_product], [ 'KichCo', '=', $size]])->first();

            DB::table('chitiethoadon')->insert(['DonGia' => $single_price, 'SoLuong' => $quantity, 'ThanhTien' => $single_price * $quantity, 'ID_SanPham' => $id_product, 'ID_HoaDon' => $id_order, 'ID_SanPham_SoLuong' => $stock->ID_SanPham_SoLuong]);
            }

            $product = DB::table('chitiethoadon')
                    ->select('ID_SanPham', DB::raw('SUM(SoLuong) as SoLuong'))
                    ->where('ID_SanPham', $id_product)
                    ->groupBy('ID_SanPham')
                    ->first();
        }
    
        Cart::destroy();

        $count = Cart::count();
        Session::put('qty_product', $count);


    }

    public function SaveInfo(Request $request)
    {

            $id = $request->user_id;
            $fullname = $request->fullname;
            $phone = $request->phone;
            $address = $request->address;

            $user = User::where('id', $id);

            $user->update(['HoTen' => $fullname, 'DienThoai' => $phone, 'DiaChi' => $address]);

            echo '
                <div class="info">
                    <div class="form-group">
                      <label>Họ Tên: </label>
                        <p>'. $fullname .'</p>

                      </div>

                    <div class="form-group">
                        <label>Số điện thoại: </label>
                       <p>'. $phone .'</p>

                    </div>
           
                        
                    <div class="form-group">
                        <label>Địa chỉ: </label>
                        <p>'. $address .'</p>

                     </div>

                     <div class="form-group">
                     </div>
                  </div>';

    }

}
