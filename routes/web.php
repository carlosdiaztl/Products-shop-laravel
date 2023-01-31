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

Route::resource('/',App\Http\Controllers\MainController::class)->names('/');
Route::resource('products', App\Http\Controllers\ProductController::class)->names('products');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('products.carts', App\Http\Controllers\ProductCartController::class)->names('products.carts');


// Route::get('products','@index')->name('products.index');

// Route::get('products/create', function () {
//     return 'In this part you can create a product';
// })->name('products.create');

// Route::post('products', function () {
// })->name('products.store');

// Route::get('products/{product}', function ($product) {
//     return "this is the product with id {$product} ";
// })->name('products.show');

// Route::get('products/{product}/edit', function ($product) {
//     return "showing the form to edit the product with id {$product} ";
// })->name('products.edit');

// Route::match(['put', 'patch'], 'products/{product}', function ($product) {
//     //
// })->name('products.update');

// route::delete('products/{product}', function ($product) {
//     //
// })->name('product.destroy');

