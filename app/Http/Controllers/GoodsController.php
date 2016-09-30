<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Goods;
use App\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsController extends Controller
{
    public function indexAction()
    {
        $goods = Goods::all();
        $categories = Categories::category();
        return view('goods.index', ['goods' => $goods, 'categories' => $categories]);
    }

    public function goodAction($id = null){
        $good = Goods::where('id', $id)->get();
        $categories = Categories::category();
        $comments = Goods::find($id)->comments()->get();
        return view('goods.show', ['id' => $id, 'good' => $good, 'categories' => $categories, 'comments' => $comments]);
    }

    public function categoryAction($id){
        $categories = Categories::category();
        $category = Categories::find($id);
        $goods = Categories::find($id)->goods;
        return view('goods.index', ['goods' => $goods, 'categories' => $categories, 'category' => $category]);
    }

    public function editAction(Comment $comment)
    {
//        $goods = new Goods;
//        $goods->comments()->save($comment);
    }

}
