<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function index()
    {
        $time = time();
        return view('static_pages.home', compact('time'));
    }

    public function help()
    {
        return view('static_pages.help');
    }

    public function about()
    {
        return view('static_pages.about');

    }
}
