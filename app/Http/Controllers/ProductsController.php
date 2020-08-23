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
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    public function show($slug)
    {
        return view('products.show', [
            'product' => Product::where('slug', $slug)->first()
        ]);
    }

    public function addProducts()
    {

        $categories = Category::all();

        return view('products.add-products', [
            'categories' => $categories,
            'spiceRatings' => SpiceRating::all()
        ]);
    }

    public function uploadProducts()
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'spice' => 'required',
            'category' => 'required',
            'description' => 'required|max:500',
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

    public function updateProductForm($slug)
    {
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

    public function updateProducts($slug)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'spice' => 'required',
            'category' => 'required',
            'description' => 'required',
            'allergies' => 'required',
        ]);

        $updateSlug = Str::slug(request('name'), '-');

        $product = Product::where('slug', $slug)->first();
        $product->slug = $updateSlug;
        $product->name = request('name');
        $product->price = request('price');

        if (request('product_image')) {
            $file = request()->product_image->getClientOriginalName();
            request()->product_image->storeAs('images/products', $file, 'public');
            $product->image = $file;
            Storage::delete('/public/images/products/' . request('delete-image'));
        } else {
            $product->image = request('selected_image');
        }

        $product->category_id = request('category');
        $product->description = request('description');
        $product->spice_id = request('spice');
        $product->allergies = request('allergies');
        $product->save();

        return redirect()->route('products');
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
        Storage::delete('/public/images/products/' . request('delete-image'));
        return redirect()->back();
    }

    public function filterProducts()
    {
    }
}
