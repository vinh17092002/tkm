<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\BillController;
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


Route::get('/', function () {
        return view('welcome');
});
// laravel khoa phạm
// Route::get('index',[PageController::class, 'getIndex'])
// ->name('trangchu');
// Route::get('loai-san-pham/{type}',[PageController::class, 'getLoaiSp'])
// ->name('loaisanpham');
// Route::get('chi-tiet-san-pham/{id}',[PageController::class, 'getChiTietSp'])
// ->name('chitietsanpham');
// Route::get('lien-he',[PageController::class, 'getLienHe'])
// ->name('lienhe');
// Route::get('gioi-thieu',[PageController::class, 'getGioiThieu'])
// ->name('gioithieu');
// Route::get('add-to-cart/{id}',[PageController::class, 'getAddToCart'])
// ->name('themgiohang');
// Route::get('del-to-cart/{id}',[PageController::class, 'getDelCart'])
// ->name('xoagiohang');


//
Route::get('home',[PageController::class, 'index'])
->name('trangchu');

Route::get('producttype/{type}',[PageController::class, 'producttype'])
->name('loaisanpham');

Route::get('productdetail/{id}',[PageController::class, 'productdetail'])
->name('chitietsanpham');

Route::get('contact',[PageController::class, 'Contact'])
->name('lienhe');

Route::get('about',[PageController::class, 'About'])
->name('gioithieu');

Route::get('add-to-cart/{id}',[PageController::class, 'getAddToCart'])
->name('themgiohang');

Route::get('del-to-cart/{id}',[PageController::class, 'getDelCart'])
->name('xoagiohang');

Route::get('dat-hang',[PageController::class, 'getCheckout'])
->name('dathang');
Route::post('dat-hang',[PageController::class, 'postCheckout'])
->name('dathang2');

Route::get('search',[PageController::class, 'Search'])
->name('timkiem');
// Route::resource('products',ProductController::class);


// Route::get('checkout',function(){
//         return view('banhang.checkout');
// })->name('checkout');

Route::get('/signup',[PageController::class,'getSignup'])->name('getSignup');
Route::post('/signup',[PageController::class,'postSignup'])->name('postSignup');

Route::get('/login',[PageController::class,'getLogin'])->name('getLogin');
Route::post('/login',[PageController::class,'postLogin'])->name('postLogin');

Route::get('/logout',[PageController::class,'getLogout'])->name('logout');



Route::get('/administrator',function(){
        return view('admin.layout.master');
        });

Route::get('/register',[UserController::class,'getSignupadmin'])->name('getSignupadmin');
Route::post('/register',[UserController::class,'postSignupadmin'])->name('postSignupadmin');

Route::get('/loginadmin',[UserController::class,'getLoginadmin'])->name('getLoginadmin');
Route::post('/loginadmin',[UserController::class,'postLoginadmin'])->name('postLoginadmin');

Route::get('/logoutAdmin',[UserController::class,'getLogoutadmin'])->name('logoutAdmin');

Route::post('/input-email',[PageController::class,'postInputEmail'])->name('postInputEmail');
Route::get('send-mail', [PageController::class, 'mail']);
// Route::get('/users/{{id}}/edit',function(){
//         return view('admin.user-edit');
//         });
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('users',function(){
        return view('admin.user-list');
    } );
    Route::resource('users',UserController::class);

    Route::get('/users/{id}/edit',[UserController::class, 'edit']);
    Route::get('/user-detail/{id}',[UserController::class, 'show']);

    Route::resource('type_products',ProductTypeController::class);

    Route::resource('products',ProductController::class);

    Route::get('/products/{id}/edit',[UserController::class, 'edit']);

    Route::resource('bills',BillController::class);

    Route::get('/bills/{id}/edit',[BillController::class, 'edit']);
    Route::resource('slides',SlideController::class);

    Route::resource('customers',CartController::class);
    Route::get('customers/view/{customer}',[CartController::class,'show']);


    });


