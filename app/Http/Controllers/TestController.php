<?php

namespace App\Http\Controllers;

use App\Models\PageMenu;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $pageMenu = PageMenu::updateOrCreate([
            "title" => "Accounting",
        ], [
            "title" => "Accounting",
            "page_directory" => "/accounting",
            "icon_class" => "mdi-scale-balance",
            "module" => "Accounting",
            "sorting_number" => 1,
            "description" => "This main page under development",
        ]);



        return view('home', ["pageMenu" => $pageMenu]);
    }
}
