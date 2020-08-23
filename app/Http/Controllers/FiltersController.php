<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function filter() {

        $filter = explode(',', request('filter'));

        return view('products.index', [
            'products' => Product::where('allergies', 'No allergies')->orderBy($filter[0], $filter[1])->get()
        ]);
    }
}
