<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/asdagfasgasg', function () {
    return redirect('/');
});
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
 
Route::controller(UserController::class)->group(function () {
    Route::get('/', 'tes');
    Route::get('/daftar', 'register_get');
    Route::post('/daftar', 'register_post');
    Route::get('/keluar', 'logout');
    Route::get('/masuk', 'login_get');
    Route::post('/masuk', 'login_post');
    Route::get('/keranjang', 'cart');
    Route::post('/checkout', 'checkout');
    Route::get('/tambahkan_keranjang/{id}', 'add_to_cart');
    Route::get('/kurangi_keranjang/{id}', 'remove_from_cart');

});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'HomeIndex');
    Route::get('/kontak', 'contactus_get');
    Route::post('/kontak', 'contactus_post');
});
