<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return view('products.index');
    }

    public function addProducts() {
        $data = request()->validate([
            'category_name' => 'required',
            'image' => 'required|file|image'
        ]);

        $file = request()->category_image->getClientOriginalName();
        request()->category_image->storeAs('images/products', $file, 'public');

        $category = new Product();
        $category->name = request('category_name');
        $category->image = $file;
        $category->save();
        return view('products.add-products');
    }
}
