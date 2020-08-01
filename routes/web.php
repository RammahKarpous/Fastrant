<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () { return view('welcome'); })->name('welcome');

    // Products
    Route::get('/products', 'ProductsController@index')->name('products');
    Route::get('/add-products', 'ProductsController@addProducts')->name('add-products');
    Route::post('/add-products', 'ProductsController@uploadProducts')->name('upload-products');

    // Categories
    Route::get('/categories', 'CategoriesController@categories')->name('categories');
    Route::post('/categories', 'CategoriesController@addCategories')->name('add-categories');
    Route::delete('/delete-category/{id}', 'CategoriesController@deleteCategory')->name('delete-category');

    // Menus
    Route::get('/menus', 'MenusController@index')->name('menus');

    // Auth Routs
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
