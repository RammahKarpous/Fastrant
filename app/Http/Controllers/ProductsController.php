<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProducts() {
        return view('products.add-products');
    }
}
