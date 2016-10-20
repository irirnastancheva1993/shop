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

    public function pushMessage($goods_id, $count)
    {
        $url = "http://localhost/shop/public/api.v1/message";

        $post_data = array (
            "goods_id" => $goods_id,
            "count" => $count,
        );

        //  инициализация
        $ch = curl_init();

        // указываем url
        curl_setopt($ch, CURLOPT_URL, $url);

        // возвращаем результаты вместо вывода
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // указываем, что у нас POST запрос
        curl_setopt($ch, CURLOPT_POST, 1);

        // добавляем переменные
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        // получаем HTML в качестве результата
        $output = curl_exec($ch);

        // закрываем соединение
        curl_close($ch);

        return $output;
    }
    public function createOrders($goods_id, $count)
    {
//        $user = Auth::guard('api')->user();
//        var_dump($user); die;
        // The data to send to the API
        $postData = array(
            'goods_id' => $goods_id,
            'count' => $count,
            'title' => 'A new post',
            'content' => 'With <b>exciting</b> content...'
        );

        $ch = curl_init('https://localhost/shop/public/api.v1/orders/'.$goods_id. '\/' . $count);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if($response === FALSE){
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);

        // Print the date from the response
        echo $responseData['published'];
    }

    public function destroyOrders($id)
    {
//        \DB::table('orders')->where('id', $id)->delete();
    }
}
