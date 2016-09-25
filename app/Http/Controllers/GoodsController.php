<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsController extends Controller
{
    public function index()
    {
//        $cards = \DB::table('cards')->get();
        $goods = Goods::all();
        return view('goods', compact('goods'));
    }
}
