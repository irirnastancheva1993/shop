<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Goods;

use App\Http\Requests;

class CommentController extends Controller
{
    public function editAction(Request $request, Goods $goods)
    {
        $goods->comments()->create([
            'user_name' => $request->user_name,
            'text' => $request->text,
            'goods_id' => $request->goods_id,
        ]);

        return redirect('category/goods/' . $goods->id);

    }
}
