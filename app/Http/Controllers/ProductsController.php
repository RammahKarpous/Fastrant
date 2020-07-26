<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function addProducts()
    {

        $categories = Category::all();

        return view('products.add-products', [
            'categories' => $categories
        ]);
    }

    public function uploadProducts()
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'allergies' => 'required',
            'image' => 'required|file'
        ]);

        $file = request()->image->getClientOriginalName();
        request()->image->storeAs('images/products', $file, 'public');

        $slug = strtolower(str_replace(' ', '_', request('name')));

        $product = new Product();
        $product->slug = $slug;
        $product->name = request('name');
        $product->price = request('price');
        $product->category_id = request('category');
        $product->description = request('description');
        $product->allergies = request('allergies');
        $product->image = $file;
        $product->save();

        return redirect()->back();
    }
}
