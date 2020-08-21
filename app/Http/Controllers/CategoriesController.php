<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Str;

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
        $category->slug = Str::slug(request('category_name'), '_');
        $category->image = $file;
        $category->save();

        return redirect()->back();
    }

    public function updateCategory($slug) {
        $data = request()->validate([
            'category_name' => 'required',
            'category_image' => 'nullable'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->name = request('category_name');
        $category->slug = Str::slug(request('category_name'), '_');

        if (request('category_image')) {
            $file = request()->category_image->getClientOriginalName();
            request()->category_image->storeAs('images/categories', $file, 'public');
            $category->image = $file;
            Storage::delete('/public/images/categories/'.request('delete-image'));
        } else {
            $category->image = request('selected_image');
        }

        $category->save();

        return redirect()->route('categories');
    }

    public function showUpdateCategories($slug) {

        $category = Category::where('slug', $slug)->first();

        return view('categories.update-category', [
            'category' => $category
        ]);
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        Storage::delete('/public/images/categories/'.request('delete-image'));
        return redirect()->back();
    }
}
