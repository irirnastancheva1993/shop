<?php

namespace App\Http\Controllers;

use App\Goods;
use App\User;
use Illuminate\Http\Request;
use App\Categories;

use App\Http\Requests;

class ApiController extends Controller
{

    public function products()
    {
        $categories = Categories::category();
        $cat = [];
//        var_dump($cat);
//        var_dump($categories); die;
        foreach ($categories as $category) {
            $name = $category['name'];
            $id = $category['id'];
//            var_dump($name, $id);
            $cat[] = ['id' => $id, 'name' => $name];
        }
//        var_dump($cat); die;
//        $categories = json_encode($cat);
//        $json = json_decode($categories);
//        var_dump($json); die;
        return response()->json($cat);


        return view('api.categories', ['categories' => $json]);
    }

    public function productCategoryId($id)
    {
        $category = Categories::find($id);
        $goods = Categories::find($id)->goods;
        return view('api.goods', ['goods' => $goods, 'category' => $category]);
    }

    public function productId($id)
    {
        $product_id = Goods::find($id);
        return view('api.product', ['product' => $product_id]);
    }

    public function showUsers()
    {
        $users = User::all();
        return view('api.users', ['users' => $users]);
    }
}
