<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\HomeController;
use App\HTTP\Controllers\ProductController;
use App\HTTP\Controllers\AdminController;
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


Route::get('/', [Homecontroller::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('product',\App\Http\Controllers\ProductController::class,)
 ->middleware(['auth']);
Route::get('/product_details/{id}', [ProductController::class, 'showCustomer']) ->middleware(['auth']);

Route::post('/add_cart/{id}', [HomeController::class, 'addCart']) ->middleware(['auth']);
Route::resource('cart',\App\Http\Controllers\CartController::class,)
 ->middleware(['auth']);
 Route::resource('order_data',\App\Http\Controllers\OrderController::class,)
 ->middleware(['auth']);

 Route::get('/cash_order', [HomeController::class, 'cashOrder']) ->middleware(['auth']);

 Route::get('/order', [AdminController::class, 'order']) ->middleware(['auth']);
 Route::post('order/destroy/{id}', [AdminController::class, 'destroy']) ->middleware(['auth']);
 Route::get('order/delivered/{id}', [AdminController::class, 'delivered']) ->middleware(['auth']);
 Route::get('order/search', [AdminController::class, 'searchOrder']) ->middleware(['auth']);

 Route::post('/product_search', [ProductController::class, 'searchProduct']);


Route::resource('category',\App\Http\Controllers\CategoryController::class)->middleware(['auth']);

Route::get('/redirect', [HomeController::class, 'redirect'])->middleware(['auth']);;


Route::get('/contact_us', [HomeController::class, 'contactUs'])->middleware(['auth']);;
Route::post('/store_contact_info', [HomeController::class, 'storeContactInfo'])->middleware(['auth']);;

Route::get('/adminDashboard', [AdminController::class, 'dashboard']) ->middleware(['auth']);
