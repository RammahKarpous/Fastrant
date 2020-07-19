<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class CategoriesController extends Controller
{
    public function categories()
    {

        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function addCategories()
    {
        $data = request()->validate([
            'category_name' => 'required',
            'category_image' => 'required|image'
        ]);

        $image = request()->file('category_image');
        $extension = $image->getClientOriginalExtension();
        Storage::disk('local')->put('public/images/categories', $image);
        // $path = request()->file('category_image')->store('categories');

        $category = new Category();
        $category->name = request('category_name');
        $category->image = $image->getFilename() . '.' . $extension;
        $category->save();
        return redirect()->back();
    }
}
