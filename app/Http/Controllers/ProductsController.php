<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return view('products.index');
    }

    public function addProducts() {
        return view('products.add-products', [
            'categories' => Category::all()
        ]);
    }
}
