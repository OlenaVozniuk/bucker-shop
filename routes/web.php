<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;


Route::prefix('login')->middleware('guest')->name('login.')->group(function () {
    Route::get('', [LoginController::class, 'showLoginForm'])->name('form');
    Route::post('', [LoginController::class, 'processLogin'])->name('process');
});

Route::get('logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('register')->middleware('guest')->name('register.')->group(function () {
    Route::get('', [RegisterController::class, 'showRegisterForm'])->name('register-form');
    Route::post('', [RegisterController::class, 'register'])->name('register');
});

Route::get('home', HomeController::class)->name('home');
Route::get('', HomeController::class);

Route::get('shop', [ProductController::class, 'index'])->name('shop');
Route::get('show/{product}', [ProductController::class, 'show'])->name('show');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::get('add-to-cart/{product}/{quantity?}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('remove-from-cart/{product}', [CartController::class, 'remove'])->name('remove-from-cart');
Route::get('clear-cart', [CartController::class, 'clearAll'])->name('clear-all');
Route::get('update/{product}/{quantity}', [CartController::class, 'update'])->name('update');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('checkout-store', [CheckoutController::class, 'store'])->name('checkout-store');

Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('add-to-wishlist/{product}', [WishlistController::class, 'addItemToWishlist'])->name('add-item-to-wishlist');
Route::get('remove-from-wishlist/{product}', [WishlistController::class, 'removeFromWishlist'])->name('remove-from-wishlist');

Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('contact', [ContactController::class, 'index'])->name('contact');

Route::post('contact', [ContactController::class, 'send'])->name('contact.send');

