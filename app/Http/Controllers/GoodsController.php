<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Goods;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\PaginationServiceProvider;
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
        return view('goods.show', ['id' => $id, 'good' => $good, 'categories' => $categories, 'category' => $category, 'comments' => $comments]);
    }

    public function categoryAction($id){
        $categories = Categories::category();
        $category = Categories::find($id);

//        $users = \DB::table('users')->paginate(5);
        $goods = \DB::table('goods')->where('categories_id', $id)->paginate(3);
//        $goods = Categories::find($id)->goods;

//        $goods_paginate = $goods;

        return view('goods.index', ['goods' => $goods, 'categories' => $categories, 'category' => $category]);
    }

    public function editAction(Comment $comment)
    {
//        $goods = new Goods;
//        $goods->comments()->save($comment);
    }

}
