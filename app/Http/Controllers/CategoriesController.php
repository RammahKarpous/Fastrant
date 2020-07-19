<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function categories() {

        return view('categories.index', [
            'categories' => Category::all()
        ]);
    }
}
