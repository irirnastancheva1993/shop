<?php

namespace App\Http\Controllers;

use App\Goods;
use App\City;
use Illuminate\Http\Request;
use App\Http\Requests;
use Cookie;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth;
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
        if(Auth::guest()){
            return redirect('auth/login');
        }
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
        $empty = "Корзина пуста!";
        $city = City::all();
        if(!$json){
            return view('goods.basket', ['empty' => $empty]);
        }
        foreach ($json as $value){
            $good_id = $value->goods_id;
            $goods = Goods::find($good_id);
            $name = $goods->name;
            $price = $goods->price;
            $count = $value->count;
            $price_count = $price * $count;
            $final_price = $final_price + $price_count;
            $result[] = ['name' => $name, 'good_id' => $good_id, 'count' => $count];
        }

        return view('goods.basket', ['result' => $result, 'city' => $city, 'final_price' => $final_price]);

    }

    public function updateBasket(Request $request)
    {
        $good_id = $request -> good_id;
        $this->validate($request, [
            'count' => 'required|between:1,50',
        ]);
        $count = $request -> count;
        $final_price = 0;

        if(isset($request -> add))
        {

            $user = \Auth::user()->id;
            $order_id = \DB::table('orders')->insertGetId([
                'user_id' => $user,
                'price' => $final_price,
                'city' => $request->city,
                'address' => $request->address
            ]);

            for($i = 0; $i < count($request->good_id); $i++) {
                \DB::table('orders__goods')->insert([
                    'goods_id' => $good_id[$i],
                    'orders_id' => intval($order_id),
                    'count' => $count[$i]
                ]);
                $goods = Goods::find($good_id[$i]);
                $price = $goods->price;
                $price_good = $price * $count[$i];
                $final_price += $price_good;
            }

            if($final_price!=0){
                \DB::table('orders')->where('id', $order_id)->update(['price' => $final_price]);
                $message = 'Заказ № ' . $order_id . ', успешно отправлен!';
            } else {
                $message = 'Вы ничего не заказали';
            }
            \Cookie::queue(\Cookie::forget('goods_basket'));
            return back()->with('message', 'Заказ № ' . $order_id . ', успешно отправлен!');

        } else if (isset($request -> update)){
            for($i = 0; $i < count($request->good_id); $i++) {
                $update_cookie[] = ['goods_id' =>  $good_id[$i], 'count' => $count[$i]];
            }
//            var_dump($update_cookie); die;
            Cookie::queue('goods_basket', json_encode($update_cookie), 360);
            return back();
        }

    }
}