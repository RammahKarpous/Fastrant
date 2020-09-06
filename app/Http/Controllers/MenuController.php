<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    //

    public function index() {
        return view('menu.index', [
            'menus' => Menu::orderBy('id','desc')->get()
        ]);
    }

    
    public function addMenu()
    {
        $data = request()->validate([
            'menu_name' => 'required',
            'menu_image' => 'required|file|image'
        ]);

        $file = request()->menu_image->getClientOriginalName();
        request()->menu_image->storeAs('images/menu', $file, 'public');

        $menu = new Menu();
        $menu->name = request('menu_name');
        $menu->slug = Str::slug(request('menu_name'), '-');
        $menu->image = $file;
        $menu->save();

        return redirect()->back();
    }

    public function deleteMenu()
    {
        $menu = Menu:: find($id);
        $menu->delete();
        Storage::delete('/public/images/menu/'.request('delete-image'));
        return redirect()->back();
    }
}
