<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
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
            'spice' => 'required',
            'category' => 'required',
            'description' => 'required',
            'allergies' => 'required',
            'image' => 'required|file'
        ]);

        $file = request()->image->getClientOriginalName();
        request()->image->storeAs('images/products', $file, 'public');

        $slug = Str::slug(request('name'), '_');

        $product = new Product();
        $product->slug = $slug;
        $product->name = request('name');
        $product->price = request('price');
        $product->category_id = request('category');
        $product->description = request('description');
        $product->spice = request('spice');
        $product->allergies = request('allergies');
        $product->image = $file;
        $product->save();

        return request()->route('products');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back();
    }

    public function filterProducts() {

    }
}
