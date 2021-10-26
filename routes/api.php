<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories routes
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'Api\CategoryController@index')->name('api.categories');
    Route::get('/count', 'Api\CategoryController@count')->name('api.categories.count');
    Route::get('/{category}', 'Api\CategoryController@show')->name('api.category');
});

// Brands routes
Route::group(['prefix' => 'brands'], function () {
    Route::get('/', 'Api\BrandController@index')->name('api.brands');
    Route::get('/count', 'Api\BrandController@count')->name('api.brands.count');
    Route::get('/{brand}', 'Api\BrandController@show')->name('api.brand');
});

// Products routes
Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'Api\ProductController@index')->name('api.products');
    Route::get('/new', 'Api\ProductController@new')->name('api.products.new');
    Route::get('/category/{category}', 'Api\ProductController@category')->name('api.product.category');
    Route::get('/count', 'Api\ProductController@count')->name('api.products.count');
    Route::get('/{product}', 'Api\ProductController@show')->name('api.product');
    Route::post('/search/{search}', 'Api\ProductController@search')->name('api.products.search');
});

// Message Route
Route::group(['prefix' => 'msg'], function () {
   Route::post('/contact', 'Api\MessageController@contact')->name('api.message.contact');
});

// Users routes
Route::get('/users/count', 'Api\UserController@count')->name('api.users.count');

