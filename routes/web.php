<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomizerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ShopTemplateController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Http\Request;

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

Route::prefix('/test')->group(function() {
    Route::get('/key-name', function() {
        return (new Product())->getKeyName();
    });
});

Route::middleware('auth')->group(function() {
    Route::resource('shops.product' ,ProductController::class)->scoped();

    Route::resource('shops.type' ,TypeController::class)->scoped();
    
    Route::resource('shops' ,ShopController::class);

    Route::resource('user' ,UserController::class);

    Route::post('/shop/{shop}/template', [ShopTemplateController::class, 'StoreTemplate'])->name('StoreTemplate');
    
    Route::get('/admin', [HomeController::class, 'AdminHome'])->name('AdminHome');
    
    Route::get('/owner', [HomeController::class, 'OwnerHome'])->name('OwnerHome');

    Route::get('/ShopSetting', [OwnerController::class, 'ShopSetting'])->name('ShopSetting');
    
    Route::get('/editshop/{shop}' ,[OwnerController::class, 'editshop'])->name('editshop');
});

Route::post('/ownerupdateshop/{shop}', [OwnerController::class, 'ownerupdateshop'])->name('ownerupdateshop');

Route::get('/createshop' ,[ShopController::class, 'createshop'])->name('createshop');

Route::post('/usercreateshop' ,[ShopController::class, 'usercreateshop'])->name('usercreateshop');

Route::get('/ownerShop', [OwnerController::class, 'ListShop'])->name('OwnerShop');

Route::get('/AllShop', [HomeController::class, 'AllShop'])->name('AllShop');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');

Route::get('/custom', [HomeController::class, 'custom'])->name('custom');

Route::get('/product/{id}',[HomeController::class, 'productDetail'])->name('productDetail');

//Stock section
Route::post('/updatestock' ,[OwnerController::class, 'updatestock'])->name('updatestock');

Route::get('/stock', [OwnerController::class, 'stock'])->name('stock');

Route::get('/stock/{shop}', [OwnerController::class, 'viewstock'])->name('viewstock');

Route::post('/CustomLayout', [CustomizerController::class, 'CustomLayout'])->name('CustomLayout');

Route::get('/session', function () {
    return session()->all();
});

//Cart Section
Route::get('/addtocart/{id}', [CartController::class, 'addtocart'])->name('addtocart');

Route::post('/updatecart', [CartController::class, 'updatecart'])->name('updatecart');

Route::get('/removefromcart/{id}', [CartController::class, 'remove'])->name('removefromcart');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

Route::post('/OrderPlacement', [OrderController::class, 'OrderPlacement'])->name('OrderPlacement');


//Home Section
Route::get('/about', function () {
    return view('about');
});

Route::get('/home', [HomeController::class, 'showitem'])->name('home');

Route::get('/home/type/{id}', [HomeController::class, 'listbytype'])->name('listbytype');

Route::get('/home/{shop}/type/{type}', [CustomizerController::class, 'listbytypeshop'])->name('listbytypeshop');

Route::get('/home/{shop}', [CustomizerController::class, 'showHome'])->name('showHome');


//Auth Section
Route::get('/auth/login', [LoginController::class, 'loginForm'])->name('login'); // name this route to login by default setting.

Route::post('/auth/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/auth/logout', [LoginController::class, 'logout'])->name('logout');

Route::post('/auth/register', [UserController::class, 'regis'])->name('regis');

Route::view('/registerform', 'user.register')->name('register');

//Search Section
Route::post('/home/search', [SearchController::class, 'searchproduct'])->name('searchproduct');


Route::view('/bill', 'Order.Billing')->name('bill');
// Route::view('/home2', 'HomeLayout.home2')->name('home2');
// Route::view('/product', 'HomeLayout.productdetail')->name('product');