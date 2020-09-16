<?php

    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;

    Route::get( '/', function () {
        return view( 'welcome' );
    } )->name( 'welcome' );

// Products
    Route::get( '/products', 'ProductsController@index' )->name( 'products' ); //Get all products
    Route::get( '/product/{slug}', 'ProductsController@show' )->name( 'product' ); //Get single product

    Route::post( '/products', 'FiltersController@filter' )->name( 'filter' ); //Get all filtered products

    Route::get( '/add-products', 'ProductsController@addProducts' )->name( 'add-products' ); //Display add product form
    Route::post( '/add-products', 'ProductsController@uploadProducts' )->name( 'upload-products' ); //Add product

    Route::get( '/update-products/{slug}', 'ProductsController@updateProductForm' )->name( 'update-product-form' );
    Route::put( '/update-products/{slug}', 'ProductsController@updateProducts' )->name( 'updated-product' );

    Route::delete( '/delete-product/{id}', 'ProductsController@deleteProduct' )->name( 'delete-product' );

// Categories
    Route::get( '/categories', 'CategoriesController@categories' )->name( 'categories' );
    Route::post( '/categories', 'CategoriesController@addCategories' )->name( 'add-categories' );

    Route::get( '/categories/{slug}', 'CategoriesController@showUpdateCategories' )->name( 'show-update-categories' );
    Route::put( '/categories/{slug}', 'CategoriesController@updateCategory' )->name( 'update-category' );

    Route::delete( '/delete-category/{id}', 'CategoriesController@deleteCategory' )->name( 'delete-category' );

// Menu
    Route::get( '/menus', 'MenuController@index' )->name( 'menus' );
    Route::post( '/menus', 'MenuController@addMenu' )->name( 'add-menu' );
    Route::delete( '/menus/edit/{slug}', 'MenuController@deleteMenu' )->name( 'edit-menu' );
    Route::delete( '/menus/{id}', 'MenuController@deleteMenu' )->name( 'delete-menu' );

// Auth Routs
    Auth::routes();
    Route::get( '/home', 'HomeController@index' )->name( 'home' );
