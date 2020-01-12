<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SanPham;
use Cart;
use Session;

class ShoppingCart extends Controller
{
	public function index()
	{
				
	}

	public function AddToCart(Request $request)
	{
		$ID_SanPham = $request->ID_SanPham;
		$size = $request->size;

		$product = DB::table('sanpham')->where('ID_SanPham', $ID_SanPham)->first();	
	

		Cart::add(array('id' => $ID_SanPham, 
						'name' => $product->TenSanPham,
						'qty' => 1,
						'price' => $product->Gia,
						'options' => array('img' => $product->HinhAnh,
										   'size' => $size
											)
		));
		$content = Cart::content();

	    $count = Cart::count();
		Session::put('qty_product', $count);

	 	return redirect()->back();
	}

	public function ShowCart()
	{
		$cart = Cart::content();

		$count = Cart::count();
		Session::put('qty_product', $count);	

		return view('cart', compact('cart'));
	}

	public function DeleteProduct(Request $request)
	{
		 $rowId = $request->rowId;

		 Cart::remove($rowId);

		 $msg = 'Data is successfully added';

		 $count = Cart::count();
		 Session::put('qty_product', $count);

		 echo $total = Cart::total() . ' VNĐ' . '|';
 		 echo $count;
	}

	public  function AddProduct(Request $request)
	{
		$unit_price = $request->unit_price;
		$rowId = $request->rowId;
		$qty = $request->qty;
		$price = $unit_price * $qty;

		Cart::update($rowId, $qty);

		$count = Cart::count();
		Session::put('qty_product', $count);

		echo $total = Cart::total() . ' VNĐ' . '|';
		echo $count;
	}


}
