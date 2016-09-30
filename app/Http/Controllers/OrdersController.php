<?php

namespace App\Http\Controllers;

use App\Goods;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests;
use Cookie;
use Illuminate\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function addGood($id)
    {
        $good = Goods::where('id', $id)->get();
        $city = City::all();
        return view('orders.show', ['good' => $good, 'city' => $city]);
    }

    public function successfulAdd($id, Request $request)
    {

//        var_dump(Cookie::get('goods_basket')); die;

        if(!Cookie::get('goods_basket')) {
            $new_cookie = json_decode(Cookie::get('goods_basket'));
            $new_cookie[] = ['goods_id' => $id, 'count' => $request -> count];
            Cookie::queue('goods_basket', json_encode($new_cookie), 360);
            return back();
        }
        $new_cookie = json_decode(Cookie::get('goods_basket'));
        $new_cookie[] = ['goods_id' => $id, 'count' => $request -> count];
        Cookie::queue('goods_basket', json_encode($new_cookie), 360);
        return back();
    }

    public function basketGoods()
    {
        $json = json_decode(Cookie::get('goods_basket'));
        $result = [];
        $final_price = 0;
        foreach ($json as $value){
            $goods = Goods::find($value->goods_id);
            $name = $goods->name;
            $price = $goods->price;
            $count = $value->count;
            $price_count = $price * $count;
            $final_price = $final_price + $price_count;
            $result[] = ['name' => $name, 'count' => $count];
        }
        $city = City::all();
        return view('goods.basket', ['result' => $result, 'city' => $city, 'final_price' => $final_price]);

    }
}