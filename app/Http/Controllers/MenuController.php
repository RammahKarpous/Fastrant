<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //

    public function index() {
        return view('menu.index', [
            'menus' => Menu::all()
        ]);
    }
}
