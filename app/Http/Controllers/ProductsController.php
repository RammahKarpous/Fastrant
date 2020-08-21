<?php

namespace App\Http\Controllers;

use App\Allergy;
use App\Category;
use App\Product;
use App\SpiceRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use App\View\Components\Allergies;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function filter()
    {
        return view('products.index', [
            'products' => Product::orderBy('name', request('filter'))
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

        $slug = Str::slug(request('name'), '-');

        $product = new Product();
        $product->slug = $slug;
        $product->name = request('name');
        $product->price = request('price');
        $product->category_id = request('category');
        $product->description = request('description');
        $product->spice_id = request('spice');
        $product->allergies = request('allergies');
        $product->image = $file;
        $product->save();

        return redirect()->route('products');
    }

    public function updateProductForm($slug) {
        $product = Product::where('slug', $slug)->first();
        $categories = Category::all();
        $allergies = Allergy::all();
        $spiceRatings = SpiceRating::all();

        return view('products.update', [
            'product' => $product,
            'categories' => $categories,
            'allergies' => $allergies,
            'spiceRatings' => $spiceRatings
        ]);
    }

    public function updateProducts()
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

        $slug = Str::slug(request('name'), '_');

        $product = new Product();
        $product->slug = $slug;
        $product->name = request('name');
        $product->price = request('price');

        if (request('category_image')) {
            $file = request()->image->getClientOriginalName();
            request()->image->storeAs('images/products', $file, 'public');
            $product->image = $file;
        } else {
            $product->image = request('selected_image');
        }

        $product->category_id = request('category');
        $product->description = request('description');
        $product->spice_id = request('spice');
        $product->allergies = request('allergies');
        $product->image = $file;
        $product->save();

        return redirect()->route('products');
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
