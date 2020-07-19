<?php

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

    Route::get('/', function () { return view('welcome'); })->name('welcome');

    // ProductsController
    Route::get('/add-products', 'ProductsController@addProducts')->name('add-products');

    // Category
    Route::get('/categories', 'CategoriesController@categories')->name('categories');
    Route::post('/categories', 'CategoriesController@addCategories')->name('add-categories');

    // Auth Routs
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
