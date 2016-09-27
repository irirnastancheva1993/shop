<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods;
use App\Categories;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::category();
        return view('home', compact('categories'));
    }

    public function about()
    {
        $categories = Categories::category();
        return view('pages.aboutus', compact('categories'));
    }

}
