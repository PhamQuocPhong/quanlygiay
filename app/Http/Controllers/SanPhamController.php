<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\SanPham;
use App\DanhGia;
use Cart;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

use App\User;

class SanPhamController extends Controller
{


   public function index(){


    $ratingProduct = DB::table('danhgia')
    				->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
    				->groupBy('ID_SanPham')
    				->get();

    $getNewProducts = DB::table('sanpham')->orderBy('ID_SanPham', 'DESC')->limit(12)->get();

    $mostBoughtProducts = DB::table('sanpham')
                              ->join('chitiethoadon', 'sanpham.ID_SanPham','chitiethoadon.ID_SanPham')
                              ->select('sanpham.ID_SanPham', 'sanpham.TenSanPham', 'sanpham.MoTa', 'sanpham.Gia', 'sanpham.HinhAnh', 'chitiethoadon.ID_SanPham')
                              ->groupBy('sanpham.ID_SanPham', 'sanpham.TenSanPham', 'sanpham.MoTa', 'sanpham.Gia', 'sanpham.HinhAnh', 'chitiethoadon.ID_SanPham')
                              ->orderByRaw('SUM(chitiethoadon.SoLuong) DESC')
                              ->limit(3)
                              ->get();

    $product = DB::table('sanpham')
    		->orderBy('ID_SanPham','DESC')
        ->offset(0)
        ->limit(6)
    		->get();

    $xhtml = "";    
    $htmlRating = "";
         foreach ($product as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item">                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    

                                   <div class="new">
                                      <p>New</p>
                                   </div>
                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }                     

     return view('master', [
                            'products' => json_encode($xhtml), 
                            'getNewProducts' => json_encode($getNewProducts),
                            'mostBoughtProducts' => json_encode($mostBoughtProducts)
                                ]);

     
   }

   public function getProductDetail($ID_SanPham, $TenSanPham)
   {

   	  $productDetail = DB::table('sanpham')->where('ID_SanPham', '=', $ID_SanPham)->get();


      $product_rating = DB::table('danhgia')->where('ID_SanPham', '=', $ID_SanPham)->avg('Rating');

      $productSize = DB::table('sanpham_soluong')->where('ID_SanPham', '=', $ID_SanPham)->get();

      $select_review = DB::table('danhgia')->join('users', 'danhgia.user_id', 'users.id')
                           ->where('ID_SanPham', '=', $ID_SanPham)
                           ->get();

      $descript = $productDetail[0]->MoTa;

      $same_product = DB::table('sanpham')->where('MaLoaiSP', '=', $productDetail[0]->MaLoaiSP )->get();

   	  return view('productdetail',[
                  'productDetail' => json_encode($productDetail),
                  'product_rating' => json_encode($product_rating),
                  'productSize' => json_encode($productSize),
                  'select_review' => json_encode($select_review),
                  'same_product' => json_encode($same_product),
                  'descript' => $descript
                ]);
   }

   public function getNewProducts()
   {
        $getNewProducts = DB::table('sanpham')->orderBy('ID_SanPham', 'DESC')->limit(12)->get();

         $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get();

         $xhtml = "";    
         foreach ($getNewProducts as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item">                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    

                                   <div class="new">
                                      <p>New</p>
                                   </div>
                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }                     
        return view('newproducts', [
                  'newproducts' => json_encode($xhtml), 
                      ]);
   }

   public function getMostBoughtProduct ()
   {

     $getMostBoughtProducts = DB::table('sanpham')
                              ->join('chitiethoadon', 'sanpham.ID_SanPham','chitiethoadon.ID_SanPham')
                              ->select('sanpham.ID_SanPham', 'sanpham.TenSanPham', 'sanpham.MoTa', 'sanpham.Gia', 'sanpham.HinhAnh', 'chitiethoadon.ID_SanPham')
                              ->groupBy('sanpham.ID_SanPham', 'sanpham.TenSanPham', 'sanpham.MoTa', 'sanpham.Gia', 'sanpham.HinhAnh', 'chitiethoadon.ID_SanPham')
                              ->orderByRaw('SUM(chitiethoadon.SoLuong) DESC')
                              ->limit(3)
                              ->get();

         $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get();

         $xhtml = "";    
         foreach ($getMostBoughtProducts as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item" style="max-width:19%;">                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    
                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }                     
        return view('mostboughtproducts', [
                  'getMostBoughtProducts' => json_encode($xhtml), 
                      ]);
   }

   public function SearchProduct(Request $request)
   {
  
     if ($request->ajax())
     {

      
        $search = $request->suggest;
        $url = $request->getURL;
        if($search)
        {

            $searchProduct =  DB::table('loaisanpham')
           ->where('loaisanpham.TenMaLoai', 'like', '%'.$search.'%')
           ->get();

              foreach ($searchProduct as $key => $value) {
                echo '<tr>                   
                            <td><a href="'. url('/search') .'?keyword='. $value->TenMaLoai .'"> '. $value->TenMaLoai .' </a></td>
                            <td><a href="'. url('/search') .'?keyword='. $value->TenMaLoai .'"> '. $url .' </a></td>  
                      </tr>';
              }
        }
        else{
            echo '';
        }
     }


     else{

         $search = $request->keyword;

          $searchProduct =  DB::table('sanpham')
         ->join('loaisanpham', 'sanpham.MaLoaiSP', 'loaisanpham.MaLoaiSP')
         ->where('loaisanpham.TenMaLoai', 'like', '%'.$search.'%')
         ->orWhere('TenSanPham', 'like', '%'.$search.'%')
         ->get();

         if(empty($searchProduct[0]))
         {
              $search = explode(" ", $search);

              for ($i = 0; $i < count($search) ; $i++) { 
               $getProducts =  DB::table('sanpham')
               ->join('loaisanpham', 'sanpham.MaLoaiSP', 'loaisanpham.MaLoaiSP')
               ->where('loaisanpham.TenMaLoai', 'like', '%'.$search[$i].'%')
               ->orWhere('TenSanPham', 'like', '%'.$search[$i].'%')
               ->get();
             }     
         }
         else{
              $getProducts =  $searchProduct;

         }
                     
          $ratingProduct = DB::table('danhgia')
                ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
                ->groupBy('ID_SanPham')

                ->get();

          $xhtml = "";

           foreach ($getProducts as $key => $value) {

               foreach ($ratingProduct as $rating) { 

                      if($value->ID_SanPham == $rating->ID_SanPham)
                      {
                            switch (round($rating->StarRating)) {
                            case 1:
                             $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                         <label> 5 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                          <label >4 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                          <label >3</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                          <label >2</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                          <label >1</label></span>'; 
                              break;
                            case 2:
                              $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                         <label> 5 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                          <label >4</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                          <label >3</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                          <label >2</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                          <label >1</label></span>'; 
                              break;
                            case 3:
                              $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                         <label> 5 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                          <label >4</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                          <label >3</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                          <label >2</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                          <label >1</label></span>'; 
                              break;
                            case 4:
                              $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                         <label> 5 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                          <label >4</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                          <label >3</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                          <label >2</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                          <label >1</label></span>'; 
                              break;
                            case 5:
                              $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                         <label> 5 </label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                          <label >4</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                          <label >3</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                          <label >2</label>
                                          <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                          <label >1</label></span>'; 
                              break;

                            default:
                              $htmlRating = '';
                              break;
                          }
                          break;
                      }
                      else{
                           $htmlRating = '';
                      }     

                  }   

             $url = url('products/product-detail/'. $value->ID_SanPham . '/'. $value->TenSanPham);

             $xhtml .= ' <div class="item">                
                      <div class="product-card">
                         <a href="'. $url .'">
                          <div class="thumb-nail">                             

                                 <div class="imgTitle">                     
                                     <img src="'. $value->HinhAnh .'" alt="" />
                                 </div>
                          </div>

                               <div class="info-product">
                                 <p><strong>'. $value->TenSanPham .'</strong></p>
                                 <p>'. number_format($value->Gia) .' đ</p>

                                <div class="rating1">
                                  <span id="rating0" class="starRating">
                                    '. $htmlRating .'
                                 </div>   
                               </div> 

                          </a>
                      </div>
                </div> ';
             }       
         return view('search',[ 'xhtml' => json_encode($xhtml) ]);
      }
      
   }

   
    public function FilterProduct(Request $request)
   {
      $require = $request->require;

      switch ($require) {
        case 'default':
           $getRequire = DB::table('sanpham')->orderBy('ID_SanPham', 'DESC')->get();
          break;
        case  'ascending':
           $getRequire = DB::table('sanpham')->orderBy('Gia', 'ASC')->get();
          break;
        case  'descending':
           $getRequire = DB::table('sanpham')->orderBy('Gia', 'DESC')->get();
             break;
        case 1:
           $getRequire = DB::table('sanpham')->where('Gia', '<', 500000)->get();
          break;
        case  2:
           $getRequire = DB::table('sanpham')->whereBetween('Gia', [500000, 2000000])->get();
          break;
        case  3:
           $getRequire = DB::table('sanpham')->whereBetween('Gia', [2000000, 5000000])->get();
          break;
        case  4:
           $getRequire = DB::table('sanpham')->whereBetween('Gia', [5000000, 10000000])->get();
          break;
        case  5:
           $getRequire = DB::table('sanpham')->whereBetween('Gia', [10000000, 20000000])->get();
          break;
        case  6:
           $getRequire = DB::table('sanpham')->where('Gia', '>'  ,20000000)->get();
          break;
        case 'adidas':
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'GTT001')->get();
            break;
        case 'nike':
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'GTT002')->get();
            break;
        case 'converse':
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'GTT003')->get();
            break;
        case 'vans':
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'GTT004')->get();
            break;
        case 'bitis':
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'GTT005')->get();
            break;
        default:
           $getRequire = DB::table('sanpham')->where('MaLoaiSP', '='  ,'')->get();
          break;
      }


      $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get();

      foreach ($getRequire as $key => $value) {

           foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   

         $url = url('products/product-detail/'. $value->ID_SanPham . '/'. $value->TenSanPham);

         echo ' <div class="item">                
                  <div class="product-card">
                     <a href="'. $url .'">
                      <div class="thumb-nail">                             

                             <div class="imgTitle">                     
                                 <img src="'. $value->HinhAnh .'" alt="" />
                             </div>
                      </div>

                           <div class="info-product">
                             <p><strong>'. $value->TenSanPham .'</strong></p>
                             <p>'. number_format($value->Gia) .' đ</p>

                            <div class="rating1">
                              <span id="rating0" class="starRating">
                                '. $htmlRating .'
                             </div>   
                           </div> 

                      </a>
                  </div>
            </div> ';
      }  
   }

   public function SeeMore(Request $request)
   {
      $currentPage = $request->page;

       $itemInPage = 6;
      // trang hiện hành

      settype($currentPage, "int");
      // page = 1, from = 9
      // page = 2, from = 16
      // page = 3, from = 24
      if($currentPage == 1)
      {
        $from = 6;
      }
      else{
        $from = $currentPage * $itemInPage;
      }


       $sanpham = DB::table('sanpham')
       ->orderBy('ID_SanPham', 'DESC')
       ->offset($from)
       ->limit($itemInPage)
       ->get();

       $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get();


       $xhtml = "";    
         foreach ($sanpham as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item">                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    

                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }                     

      echo $xhtml;
   }

   public function TypeProduct($type_product)
   {
      $productsByType =  DB::table('loaisanpham')
           ->join('sanpham', 'loaisanpham.MaLoaiSP', 'sanpham.MaLoaiSP')
           ->where('loaisanpham.TenMaLoai', 'like', '%'. $type_product.'%')
           ->orWhere('loaisanpham.MoTa', 'like', '%'. $type_product . '%')
           ->get();  

      $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get(); 


        $xhtml = "";    
         foreach ($productsByType as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item" >                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    

                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }  
       return view('product', ['productsByType' => $xhtml]);
                   
   }

   public function AllProducts()
   {
       $allproducts =  DB::table('sanpham')->get();

      $ratingProduct = DB::table('danhgia')
            ->select('ID_SanPham', DB::raw('AVG(Rating) as StarRating'))
            ->groupBy('ID_SanPham')

            ->get(); 


        $xhtml = "";    
         foreach ($allproducts as  $value) {

              foreach ($ratingProduct as $rating) { 

                  if($value->ID_SanPham == $rating->ID_SanPham)
                  {
                        switch (round($rating->StarRating)) {
                        case 1:
                         $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" checked>
                                      <label >1</label></span>'; 
                          break;
                        case 2:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" checked>
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 3:
                          $rating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" checked>
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 4:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" >
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" checked>
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;
                        case 5:
                          $htmlRating = '<input  type="radio" name="rating'. $rating->ID_SanPham .'" value="5" checked>
                                     <label> 5 </label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="4" >
                                      <label >4</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="3" >
                                      <label >3</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="2" >
                                      <label >2</label>
                                      <input  type="radio" name="rating'. $rating->ID_SanPham .'" value="1" >
                                      <label >1</label></span>'; 
                          break;

                        default:
                          $htmlRating = '';
                          break;
                      }
                      break;
                  }
                  else{
                       $htmlRating = '';
                  }     

              }   
              $url = url('products/product-detail/' . $value->ID_SanPham . '/' . $value->TenSanPham);

                $xhtml .= '  
                    <div class="item" >                
                        <div class="product-card">
                           <a href="' . $url . '">
                            <div class="thumb-nail">                             

                                   <div class="imgTitle">                     
                                       <img src="'. $value->HinhAnh .'" alt="" />
                                   </div>                                    

                            </div>

                                 <div class="info-product">
                                   <p><strong>'. $value->TenSanPham .'</strong></p>
                                   <p>'. number_format($value->Gia) .' đ</p>


                                  <div class="rating1">
                                    <span id="rating'. $value->ID_SanPham .'" class="starRating">
                                    '. $htmlRating .'                                                                 
                                   </div>   
                                 </div> 

                            </a>
                        </div>
                     </div> ';
           }  
       return view('allproduct', ['allproducts' => $xhtml]);
   }

}
