<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index'); // Return the view for the index page
    }
    public function about()
    {
        return view('pages.about'); // Return the view for the index page
    }
    public function translate()
    {
        return view('pages.translate'); // Return the view for the index page
    }
}
