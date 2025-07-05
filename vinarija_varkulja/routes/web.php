<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/admin', function () {
    return view('admin_home');
});

Route::any('/grape/middle', function () {
    return view('grape.middle');
});

Route::any('/home/about', function () {
    return view('home.about');
});

Route::any('/home/contact', function () {
    return view('home.contact');
});

Route::any('/home/gallery', function () {
    return view('home.gallery');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('home.admin_home');
Route::post('mail_contact', [App\Http\Controllers\HomeController::class, 'mail_contact'])->name('home.mail_contact');

//routes for GrapeController
Route::resource('grape', App\Http\Controllers\GrapeController::class)->except([
    'index'
]);
Route::post('grape/store', [App\Http\Controllers\GrapeController::class, 'store']);
Route::any('grape', [App\Http\Controllers\GrapeController::class, 'index'])->name('grape.index');

//routes for WineController
Route::resource('wine', App\Http\Controllers\WineController::class)->except([
    'index'
]);
Route::post('wine/store', [App\Http\Controllers\WineController::class, 'store']);
Route::any('wine', [App\Http\Controllers\WineController::class, 'index'])->name('wine.index');

//routes for BottleController
Route::resource('bottle', App\Http\Controllers\BottleController::class)->except([
    'index'
]);
Route::post('bottle/store', [App\Http\Controllers\BottleController::class, 'store']);
Route::any('bottle', [App\Http\Controllers\BottleController::class, 'index'])->name('bottle.index');
Route::post('bottle/update', [App\Http\Controllers\BottleController::class, 'update']);

//routes for RecieptController
Route::resource('reciept', App\Http\Controllers\RecieptController::class)->except([
    'index'
]);
Route::post('reciept/store', [App\Http\Controllers\RecieptController::class, 'store']);
Route::any('reciept', [App\Http\Controllers\RecieptController::class, 'index'])->name('reciept.index');


//routes for UserController
Route::resource('user', App\Http\Controllers\UserController::class)->except([
    'index'
]);
Route::post('user/store', [App\Http\Controllers\UserController::class, 'store']);
Route::any('user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');

Route::any('shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('shop/cartItems', [App\Http\Controllers\ShopController::class, 'cartItems'])->name('shop.cartItems');
Route::post('shop/addItems', [App\Http\Controllers\ShopController::class, 'addItems'])->name('shop.addItems');
Route::post('shop/removeItem', [App\Http\Controllers\ShopController::class, 'removeItem'])->name('shop.removeItem');


//routes for RecieptBottleController
Route::resource('invoice', App\Http\Controllers\RecieptBottleController::class)->except([
    'index'
]);
Route::post('invoice/store', [App\Http\Controllers\RecieptBottleController::class, 'store']);
Route::any('invoice', [App\Http\Controllers\RecieptBottleController::class, 'index'])->name('invoice.index');