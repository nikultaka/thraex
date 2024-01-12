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



// Products Details
Route::any('/products/details/{id?}', [App\Http\Controllers\Admin\ProductController::class, 'productDetail'])->name('products.details');
Route::any('/save/products/details', [App\Http\Controllers\Admin\ProductController::class, 'productDetailSave'])->name('products.description');
Route::any('/edit/products/details', [App\Http\Controllers\Admin\ProductController::class, 'productDetailsEdit'])->name('products.detailsedit');
Route::any('/delete/products/details', [App\Http\Controllers\Admin\ProductController::class, 'productDetailsDelete'])->name('products.detailsdel');

// Product Description
Route::any('/save/products/description', [App\Http\Controllers\Admin\ProductController::class, 'productDescriptionSave'])->name('products.descriptionsave');

// Product Technology Details
Route::any('/save/products/technology', [App\Http\Controllers\Admin\ProductController::class, 'technologySave'])->name('products.technologysave');


// Product Sub Technology Details
Route::any('/subtechnology/save', [App\Http\Controllers\Admin\ProductController::class, 'subTechnologySave'])->name('products.subtechnologysave');
Route::any('/save/products/addon', [App\Http\Controllers\Admin\ProductController::class, 'subTechnologySave'])->name('products.addonsave');

// Sub-Products
Route::any('/subproducts', [App\Http\Controllers\Admin\SubProductController::class, 'index'])->name('subproducts');
Route::any('/subproducts/save', [App\Http\Controllers\Admin\SubProductController::class, 'subProductSave'])->name('subproducts.save');
Route::any('/subproducts/edit', [App\Http\Controllers\Admin\SubProductController::class, 'subProductEdit'])->name('subproducts.edit');
Route::any('/subproducts/delete', [App\Http\Controllers\Admin\SubProductController::class, 'subProductDelete'])->name('subproducts.delete');


Route::any('/subproducts/description', [App\Http\Controllers\Admin\SubProductController::class, 'description'])->name('subproducts.description');


