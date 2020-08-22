<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () { return view('welcome'); })->name('welcome');

    // Products
    Route::get('/products', 'ProductsController@index')->name('products'); //Get all products
    Route::get('/product/{slug}', 'ProductsController@show')->name('product'); //Get single product

    Route::post('/products', 'ProductsController@filter')->name('filter-products'); //Get all filtered products

    Route::get('/add-products', 'ProductsController@addProducts')->name('add-products'); //Display add product form
    Route::post('/add-products', 'ProductsController@uploadProducts')->name('upload-products'); //Add product

    Route::get('/update-products/{slug}', 'ProductsController@updateProductForm')->name('update-product-form');
    Route::put('/update-products/{slug}', 'ProductsController@updateProducts')->name('updated-product');

    Route::delete('/delete-product/{id}', 'ProductsController@deleteProduct')->name('delete-product');

    // Categories
    Route::get('/categories', 'CategoriesController@categories')->name('categories');
    Route::post('/categories', 'CategoriesController@addCategories')->name('add-categories');

    Route::get('/categories/{slug}', 'CategoriesController@showUpdateCategories')->name('show-update-categories');
    Route::put('/categories/{slug}', 'CategoriesController@updateCategory')->name('update-category');

    Route::delete('/delete-category/{id}', 'CategoriesController@deleteCategory')->name('delete-category');

    // Menus
    Route::get('/menus', 'MenusController@index')->name('menus');

    // Auth Routs
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');
