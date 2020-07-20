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
            'category_image' => 'required|file|image'
        ]);

        $file = request()->category_image->getClientOriginalName();
        request()->category_image->storeAs('images/categories', $file, 'public');

        $category = new Category();
        $category->name = request('category_name');
        $category->image = $file;
        $category->save();

        return redirect()->back();
    }
}
