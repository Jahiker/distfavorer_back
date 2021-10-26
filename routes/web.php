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
    if(Auth::user()){
        return view('home');
    }else{
        return view('auth.login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function(){

    Route::resource('categories', 'Backend\CategoryController');
    Route::post('categories/search', 'Backend\CategoryController@search')->name('categories.search');

    Route::resource('brands', 'Backend\BrandController');
    Route::post('brands/search', 'Backend\BrandController@search')->name('brands.search');

    Route::resource('products', 'Backend\ProductController');
    Route::post('products/search', 'Backend\ProductController@search')->name('products.search');

    Route::middleware(['authorized.user'])->group(function(){
        Route::resource('users', 'Backend\UserController');
        Route::post('users/search', 'Backend\UserController@search')->name('users.search');
    });

});

