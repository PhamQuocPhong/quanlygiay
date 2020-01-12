<?php
use Illuminate\Http\Response;

use Illuminate\Support\Facades\DB;
use App\User;
use App\ActiveEmail;
use App\Order;
use App\OrderDetail;
use App\SanPham_SoLuong;
	function GenerateRandomString($length)
    {
        $characters = '0123456789qwertyuiopasdfghjklzxcvbnm';
        $characterLength = strlen($characters);
        $randomString = "";
        for ($i=0; $i < $length ; $i++) { 
            $randomString .= $characters[rand(0, $characterLength - 1)];
        }
        return $randomString;
    }

    function SelectBillInfoByUser($user_id)
    {
        $billInfo = DB::table('hoadon')->where('user_id', $user_id)->get();
        return $billInfo;
    }

    function SelectDetailInfo($billID)
    {
         $detailBill = OrderDetail::join('sanpham', 'chitiethoadon.ID_SanPham', 'sanpham.ID_SanPham')
                    ->leftjoin('sanpham_soluong', 'chitiethoadon.ID_SanPham_SoLuong', 'sanpham_soluong.ID_SanPham_SoLuong')
                    ->select('chitiethoadon.*', 'sanpham.TenSanPham', 'sanpham.HinhAnh', 'sanpham_soluong.KichCo')
                    ->where('ID_HoaDon', $billID)
                    ->get();
         return $detailBill;
    }

?>