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
        return view('goods.index', compact('goods'));
    }

    public function show($id)
    {
        $good = Goods::where('id', $id)->get();

//        foreach($good as $row) {
//            echo $row->name . $row->image . $row->price . $row->description . $row->article;
//        }

        return view('goods.show', ['good' => $good]);
    }
}
