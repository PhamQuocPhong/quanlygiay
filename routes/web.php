<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\Authenticate;

use App\Http\Middleware\AdminAuthenticate;

App::register('Gloudemans\Shoppingcart\ShoppingcartServiceProvider');

Route::get('/', 'SanPhamController@index')->name('/');

Route::get('/see-more', 'SanPhamController@SeeMore');

Route::get('/register', 'NguoiDungController@CreateRegistration' );

Route::post('/register', 'NguoiDungController@ActionRegistration')->name('register');

Route::post('/register/confirm', 'NguoiDungController@ConfirmRegister');

Route::get('/login', 'NguoiDungController@ShowLogin');

Route::post('/login', 'NguoiDungController@ActionLogin')->name('login');

Route::get('/logout', 'NguoiDungController@ActionLogout')->name('logout');

Route::get('gio-hang', 'ShoppingCart@ShowCart')->name('shopping-cart');

Route::post('gio-hang/post', 'ShoppingCart@DeleteProduct');

Route::post('gio-hang/quantity', 'ShoppingCart@AddProduct');



Route::group(['prefix'=>'user', 'middleware' => Authenticate::class] ,function(){
   		
    Route::get('/checkout', 'OrderController@index')->name('checkout');   

    Route::post('/chi-tiet-san-pham/{ID_SanPham}', 'DanhGiaController@index')->name('product-review');   

    Route::post('/checkout/payment', 'OrderController@Payment');

    Route::post('/checkout/info', 'OrderController@SaveInfo');

    Route::get('/profile', 'NguoiDungController@Profile');

    Route::post('/profile', 'NguoiDungController@Info')->name('profile');

    Route::get('/ordering', 'NguoiDungController@Ordering')->name('ordering');

    Route::post('/ordering/delete', 'NguoiDungController@DeleteBill');

    Route::get('/address', 'NguoiDungController@Address');

});      


Route::group(['prefix'=>'products'],function(){
   		
   	  Route::get('/product-detail/{ID_SanPham}/{TenSanPham}', 'SanPhamController@getProductDetail');
      
      Route::post('/product-detail/{ID_SanPham}', 'ShoppingCart@AddToCart')->name('product-add');

      Route::get('/cate/{type_product}/', 'SanPhamController@TypeProduct');

      Route::get('/new-product', 'SanPhamController@getNewProducts');

      Route::get('/mua-nhieu-nhat', 'SanPhamController@getMostBoughtProduct');

      Route::get('/all-products', 'SanPhamController@AllProducts');

      Route::get('/all-products/get', 'SanPhamController@FilterProduct');


});


Route::get('/search/', 'SanPhamController@SearchProduct')->name('search');


Route::group(['prefix' => 'admin'], function(){

    Route::get('login','Admin\LoginController@index');
    Route::post('login','Admin\LoginController@ActionLogin');

    Route::get('logout', 'Admin\LoginController@ActionLogout');


    Route::group(['middleware' => AdminAuthenticate::class],  function(){


    Route::get('dashboard', 'Admin\MainController@index');

    Route::get('profile', 'Admin\ProfileController@index');

    // Route accounts

    Route::get('customer', 'Admin\CustomerController@index');

    Route::post('customer/delete', 'Admin\CustomerController@Del');

    // Route products

    Route::get('product', 'Admin\SanPhamController@index');

    Route::post('product/add', 'Admin\SanPhamController@Add');

    Route::post('product/delete', 'Admin\SanPhamController@Delete');

    Route::post('product/edit', 'Admin\SanPhamController@Edit');

    // Route orders
    Route::get('order', 'Admin\OrderController@index');

    // Route products type

    });
 });      



Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');


Route::get('/test', 'AjaxController@index');


