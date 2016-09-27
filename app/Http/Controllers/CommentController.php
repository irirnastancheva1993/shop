<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Goods;

use App\Http\Requests;

class CommentController extends Controller
{
    public function editAction($id, Request $request, Goods $goods)
    {
        $goods_id = intval($id);
        var_dump($request->id);
        $goods->comments()->create([
            'user_name' => $request->user_name,
            'text' => $request->text,
            'goods_id' => $request->id,
        ]);


        return redirect('goods/' . $goods_id);

    }
}
