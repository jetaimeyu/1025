<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    //
    public function index()
    {
        $time = time();
$arr = [1,2,3];

        dd(array_first($arr));
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
