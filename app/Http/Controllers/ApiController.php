<?php

namespace App\Http\Controllers;

use App\Goods;
use App\User;
use Illuminate\Http\Request;
use App\Categories;

use App\Http\Requests;

class ApiController extends Controller
{

    public function categories()
    {

        $categories = \DB::table('categories')->select('id', 'name')->get();
        $result = json_encode($categories, JSON_UNESCAPED_UNICODE);
        return $result;
//        return response()->json($categories, JSON_UNESCAPED_UNICODE);
    }

    public function getGoodId($id)
    {
//        $category = Categories::find($id);
        $good_id = \DB::table('goods')->select('id', 'name', 'price', 'image', 'description', 'article', 'created_at')->where('id', $id)->get();
        $result = json_encode($good_id, JSON_UNESCAPED_UNICODE);
        return $result;
    }

    public function categoryGoods($id)
    {
        $category_goods = Categories::find($id)->goods;
        $result = json_encode($category_goods, JSON_UNESCAPED_UNICODE);
        return $result;
//        return response()->json($category_goods);
    }

    public function showUsers()
    {
        $users = User::all();
        $result = json_encode($users, JSON_UNESCAPED_UNICODE);
        return $result;
    }

    public function createOrders()
    {

    }

    public function destroyOrders($id)
    {

    }
}
