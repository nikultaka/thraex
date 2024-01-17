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

// Route::get('/', function () {
//     return view('frontend.layouts.index');
// });

Auth::routes();

// Route::any('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
Route::any('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])
    ->name('admin.login')
    ->middleware('AdminMiddleware');
Route::any('/admin/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['guest']], function () {
    Route::any('/', [App\Http\Controllers\Frontend\MainController::class, 'index'])->name('front.home');
    Route::get('/get-subproducts/{productId?}', [App\Http\Controllers\Frontend\MainController::class, 'getSubproducts'])->name('get.subproducts');

    Route::any('/products/all', [App\Http\Controllers\Frontend\ProductController::class, 'index'])->name('front.products');
    
    });

// Admin Group
Route::middleware(['auth', 'admin'])->group(function () {
    // Admin-only routes go here
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
Route::any('/subtechnology/save', [App\Http\Controllers\Admin\ProductController::class, 'subTechnologySave'])
->name('products.subtechnologysave');

Route::any('/subproducts/details/{id?}', [App\Http\Controllers\Admin\SubProductController::class, 'subProductDetail'])->name('subproducts.details');
Route::any('/subproducts/addon/{id?}', [App\Http\Controllers\Admin\SubProductController::class, 'addOn'])->name('subproducts.addon');
Route::any('/save/products/addon', [App\Http\Controllers\Admin\SubProductController::class, 'addOnSave'])->name('products.addonsave');
Route::any('/edit/products/addon', [App\Http\Controllers\Admin\SubProductController::class, 'addOnEdit'])->name('products.addonedit');
Route::any('/delete/products/addon', [App\Http\Controllers\Admin\SubProductController::class, 'addOnDelete'])
->name('products.addondelete');

Route::any('/save/products/material', [App\Http\Controllers\Admin\ProductController::class, 'materialSave'])->name('products.material');

// Sub-Products
Route::any('/subproducts', [App\Http\Controllers\Admin\SubProductController::class, 'index'])->name('subproducts');
Route::any('/subproducts/save', [App\Http\Controllers\Admin\SubProductController::class, 'subProductSave'])->name('subproducts.save');
Route::any('/subproducts/edit', [App\Http\Controllers\Admin\SubProductController::class, 'subProductEdit'])->name('subproducts.edit');
Route::any('/subproducts/delete', [App\Http\Controllers\Admin\SubProductController::class, 'subProductDelete'])->name('subproducts.delete');


Route::any('/subproducts/description', [App\Http\Controllers\Admin\SubProductController::class, 'description'])->name('subproducts.description');

});




