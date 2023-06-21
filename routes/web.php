<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.home');
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('items', ItemController::class);
Route::get('/itemdetails/{item}', [ItemController::class, 'itemDetails'])->name('items.details');

Route::get('/carts/{id}', [CartController::class, 'index'])->name('carts.index');
Route::post('/carts/store', [CartController::class, 'store'])->name('carts.store');
Route::post('/carts/destroy', [CartController::class, 'destroy'])->name('carts.destroy');
Route::post('/carts/update', [CartController::class, 'update'])->name('carts.update');

Route::get('/checkout/{id}', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/checkout/store', [OrderController::class, 'store'])->name('orders.store');
Route::get('/myorders/{id}', [OrderController::class, 'myorders'])->name('orders.myorders');
Route::get('/myorders/show/{order}', [OrderController::class, 'show'])->name('orders.show');

Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
Route::get('/orders/show/{order}', [OrderController::class, 'detailOrder'])->name('admin.detailorder');
Route::get('/orders/confirm/{order}', [OrderController::class, 'confrimOrder'])->name('admin.confirmorder');
Route::get('/orders/document/{order}', [OrderController::class, 'document'])->name('admin.documenorder');
Route::get('/dashboards', [OrderController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/get-origins', [ShippingController::class, 'getOrigins']);
Route::get('/get-destinations', [ShippingController::class, 'getDestinations']);
Route::get('/calculate-shipping', [ShippingController::class, 'calculateShipping']);


Route::resource('sales', SaleController::class);

Route::get('generate-pdf/{id}', [SaleController::class, 'generatePDF']);


Route::get('/item/data', [ItemController::class, 'getItem'])->name('item.data');