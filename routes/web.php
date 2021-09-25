<?php

use App\Http\Controllers\Shop\User\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shop\User\CatalogController;
use App\Http\Controllers\Shop\User\ProductController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\Shop\User\IndexController::class, 'index'])->name('index');
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');

Route::middleware(['role:admin'])->prefix('admin')->group(function () {
  Route::get('/', [App\Http\Controllers\Shop\Admin\IndexController::class, 'index'])->name('admin-index');
  Route::resource('/categories', App\Http\Controllers\Shop\Admin\CategoryController::class);
  Route::resource('/products', App\Http\Controllers\Shop\Admin\ProductController::class);
});

Route::group(['prefix' => 'category/{category}'], function () {
  Route::group(['prefix' => 'product/{product}'], function () {
    Route::get('/', ['as' => 'shop_show_product', 'uses' => 'App\Http\Controllers\Shop\User\ProductController@product']);
  });
  Route::get('/', ['as' => 'shop_show_category', 'uses' => 'App\Http\Controllers\Shop\User\CategoryController@category']);
});

Route::get('/search/autocomplete',[App\Http\Controllers\Shop\User\ProductController::class, 'searchAutocompilation'])->name('search.autocompilation');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
