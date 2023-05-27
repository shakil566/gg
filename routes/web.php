<?php

use Illuminate\Support\Facades\Auth;
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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about-us', [App\Http\Controllers\FrontendController::class, 'aboutUs'])->name('about-us');
Route::get('/faq', [App\Http\Controllers\FrontendController::class, 'faq'])->name('faq');
Route::get('/contact', [App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('/shopping-cart', [App\Http\Controllers\FrontendController::class, 'shoppingCart'])->name('shopping-cart');
Route::get('/checkout', [App\Http\Controllers\FrontendController::class, 'checkout'])->name('checkout');
Route::get('/single-product', [App\Http\Controllers\FrontendController::class, 'singleProduct'])->name('single-product');
Route::get('/wishlist', [App\Http\Controllers\FrontendController::class, 'wishlist'])->name('wishlist');
Route::get('/shop-left-sidebar', [App\Http\Controllers\FrontendController::class, 'shopLeftSidebar'])->name('shop-left-sidebar');
Route::get('/blog-details', [App\Http\Controllers\FrontendController::class, 'blogDetails'])->name('blog-details-left-sidebar');
