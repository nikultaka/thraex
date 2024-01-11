<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Auth::routes();

Route::any('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
Route::any('/admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');



// Admin Group
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

// Products
Route::any('/products', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('products');
Route::any('/product/save', [App\Http\Controllers\Admin\ProductController::class, 'productSave'])->name('products.save');
Route::any('/product/edit', [App\Http\Controllers\Admin\ProductController::class, 'productEdit'])->name('products.edit');
Route::any('/product/delete', [App\Http\Controllers\Admin\ProductController::class, 'productDelete'])->name('products.delete');
Route::any('/products/description/{id?}', [App\Http\Controllers\Admin\ProductController::class, 'productDescription'])->name('products.description');


// Sub-Products
Route::any('/subproducts', [App\Http\Controllers\Admin\SubProductController::class, 'index'])->name('subproducts');
Route::any('/subproducts/save', [App\Http\Controllers\Admin\SubProductController::class, 'subProductSave'])->name('subproducts.save');
Route::any('/subproducts/edit', [App\Http\Controllers\Admin\SubProductController::class, 'subProductEdit'])->name('subproducts.edit');
Route::any('/subproducts/delete', [App\Http\Controllers\Admin\SubProductController::class, 'subProductDelete'])->name('subproducts.delete');


Route::any('/subproducts/description', [App\Http\Controllers\Admin\SubProductController::class, 'description'])->name('subproducts.description');


