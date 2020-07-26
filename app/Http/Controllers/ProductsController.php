<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index() {
        return view('products.index');
    }

    public function addProducts() {

        $categories = Category::all();

        return view('products.add-products', [
            'categories' => $categories
        ]);
    }

    public function uploadProducts() {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|file|image'
        ]);

        $file = request()->category_image->getClientOriginalName();
        request()->category_image->storeAs('images/products', $file, 'public');

        $category = new Product();
        $category->name = request('category_name');
        $category->image = $file;
        $category->save();

        return redirect()->back();
    }
}
