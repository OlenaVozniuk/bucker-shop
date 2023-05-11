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

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'categories'    => CategoryController::class,
    'subcategories' => SubcategoryController::class,
    'products'      => ProductController::class,
    'users'         => UserController::class,
]);
Route::get('categories/{category}/subcategories', [CategoryController::class, 'showSubcategories'])
    ->name('categories.subcategories');
Route::get('categories/{category}/products', [CategoryController::class, 'showProducts'])
    ->name('categories.products');

Route::get('users/{user}/status', [UserController::class, 'changeUserStatus'])
    ->name('user.status');


