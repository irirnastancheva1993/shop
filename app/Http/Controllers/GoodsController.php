<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Goods;
use App\Categories;
use App\Images;
use Illuminate\Http\Request;
use App\Http\Requests;

class GoodsController extends Controller
{
    public function indexAction()
    {
        $categories = Categories::category();
        return view('goods.category', ['categories' => $categories]);
    }

    public function goodAction($id = null){
        $good = Goods::where('id', $id)->get();
        foreach ($good as $item){
            $category_id = $item->categories_id;
        }
        $category = Categories::find($category_id);
        $categories = Categories::category();
        $comments = Goods::find($id)->comments()->get();

        //Выбирает все картинки относящиеся к определенному товару
        $images = \DB::table('goods')
            ->select('images.goods_id', 'images.url')
            ->where('goods.id', $id)
            ->leftJoin('images', 'goods.id', '=', 'images.goods_id')
            ->get();
//        var_dump($images); die;
        return view('goods.show', ['id' => $id, 'good' => $good, 'images' => $images, 'categories' => $categories, 'category' => $category, 'comments' => $comments]);
    }

    public function categoryAction($id){
        $categories = Categories::category();
        $category = Categories::find($id);
        $goods = \DB::table('goods')->where('categories_id', $id)->paginate(3);
//        $goods = Categories::find($id)->goods;
        $images = [];
        foreach ($goods as $good){
            $url_image = \DB::table('images')->select('url')->where('goods_id', $good->id)->first();
                $images[] = ['id' => $good->id, 'url' => $url_image->url];
        }

//        $images = Categories::find($id)->images;
////        var_dump($images);die;
//        foreach ($images as $image){
//            var_dump($image->url);
//            echo "<br>";
//        }
//        die;
//        var_dump($images); die;


//        $goods_paginate = $goods;

        return view('goods.index', ['goods' => $goods, 'images' => $images, 'categories' => $categories, 'category' => $category]);
    }

    public function editAction(Comment $comment)
    {
//        $goods = new Goods;
//        $goods->comments()->save($comment);
    }

}
