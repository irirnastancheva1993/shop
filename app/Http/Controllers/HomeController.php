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
        return view('home');
    }

    public function goodAction($id = null){
        $goods = Goods::find($id);
        $categories = Categories::all();
        $comments = Goods::find($id)->comments()->get();
        return view('product', ['goods' => $goods, 'categories' => $categories, 'comments' => $comments]);
    }
    public function shopAction(){
        $goods = Goods::all();
        return view('layouts.app', ['goods' => $goods]);
    }

    public function categoryAction($id){
        $goods = Categories::find($id)->goods;
        return view('layouts.app', ['goods' => $goods]);
    }

    public function shoptestAction() {
        $categoryGoods = Categories::find(1)->goods;
        foreach ($categoryGoods as $value) {
            echo $value->name . '<br/>';
        }
    }

}
