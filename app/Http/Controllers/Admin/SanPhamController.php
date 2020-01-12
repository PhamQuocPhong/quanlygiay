<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
use App\SanPham_SoLuong;
use App\LoaiSanPham;
use App\NhaSanXuat;
use Session;
use Illuminate\Support\Facades\DB;
class SanPhamController extends Controller
{
    public function index(){

  
    			$products = SanPham::join('sanpham_soluong', 'sanpham.ID_SanPham', 'sanpham_soluong.ID_SanPham')
					->select('sanpham.ID_SanPham', 'sanpham.TenSanPham', 'sanpham.MoTa' , 'sanpham.HinhAnh', 'sanpham.Gia', 'sanpham.LuotDanhGia', DB::raw('SUM(sanpham_soluong.SoLuong) as Quantity'))
					->orderBy('ID_SanPham', 'DESC')
					->groupBy('sanpham.ID_SanPham','sanpham.TenSanPham', 'sanpham.MoTa' , 'sanpham.HinhAnh', 'sanpham.Gia', 'sanpham.LuotDanhGia')
					->get();

		$product_types = LoaiSanPham::get();

		return view('admin.product', ['products' => $products, 'product_types' => $product_types]);


	
	}

	public function Add(Request $request)
	{	
		$name_product = $request->name_product;
		$descript = $request->descript;
		$price = $request->price;
		$size = $request->size;
		$quantity = $request->quantity;
		$url_image = $request->url_image;
		$product_type = $request->product_type;

		$id_product = DB::table('sanpham')->insertGetId([
							'TenSanPham' => $name_product,
							'MoTa' => $descript,  
							'Gia' => $price, 
							'HinhAnh' => $url_image,
							'MaLoaiSP' => $product_type]);
		DB::table('sanpham_soluong')->insert(['KichCo' => $size, 'SoLuong' => $quantity, 'ID_SanPham' => $id_product]);

		echo '
			<tr>
			    <td>{{$stt}}</td>
			    <td>'. $name_product .'</td>
			    <td><img src="'. $url_image .'" class="img-responsive" width="50" height="50" ></td>
			    <td>'. $quantity .'</td>
			    <td id="domPrice'. $id_product .'" >' . number_format($price) . ' đ</td>
			    <td class="text-center">0</td>
			    <td class="text-center">0</td>

			    <td>
			        <button class="edit" value="'. $id_product .'"  data-toggle="modal" data-target="#myModal'. $id_product .'"> Sửa </button> |
			        <button class="del" value="'. $id_product .'" onclick="return confirm("Bạn muốn xóa sản phẩm này?");"> Xóa </button>  </td>
			</tr> ';
	}

	public function Delete(Request $request)
	{
		$id_product = $request->id_product;

		$product = SanPham::where('ID_SanPham', $id_product);

		$product->delete();
	}

	public function Edit(Request $request)
	{
		$id_product = $request->id_product;
		$price = $request->price;
		$descript_edit = $request->descript_edit;

		if($price <= 10000)
		{
			echo 0;
		}
		else{
			$product = SanPham::where('ID_SanPham', $id_product);
			$product->update(['Gia' => $price, 'MoTa' => $descript_edit]);
			echo 1;
		}		


	}
}
