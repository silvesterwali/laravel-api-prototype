<?php

namespace App\Http\Controllers;

use App\Models\PageMenu;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;

class TestController extends Controller
{
    public function index()
    {
        $pageMenus = PageMenu::all();
        return new \App\Mail\OrderShipped($pageMenus);
    }
}
