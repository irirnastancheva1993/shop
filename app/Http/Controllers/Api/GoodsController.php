<?php

namespace App\Http\Controllers\Api;

use App\Goods;
use App\Orders;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GoodsController extends Controller
{

    public function index()
    {
//        $user = Auth::guard('api')->user();
//        var_dump($user); die;
        $goods = Goods::select('id', 'name', 'price')->get();
        return json_encode($goods, JSON_UNESCAPED_UNICODE);
//        return response()->json($goods, JSON_UNESCAPED_UNICODE);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        $goods = $request->input('goods');
//        return Goods::create([
//            'user_id' => Auth::guard('api')->id(),
//        ]);
    }

    public function show($id)
    {
        $goods = Goods::where('id', $id)->first();
        return json_encode($goods, JSON_UNESCAPED_UNICODE);
//        return response()->json($goods, JSON_UNESCAPED_UNICODE);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
