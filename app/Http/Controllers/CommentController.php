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
//        $this->validate($request,[
//           'user_name' => 'required|unique:users,name|max:255',
//            'text' => 'required|email|min:10',
//            'email' => 'required|email|max:255',
//        ]);

        $goods->comments()->create([
            'user_name' => $request->user_name,
            'text' => $request->text,
            'email' => $request->email,
            'goods_id' => $request->goods_id,
        ]);

        /* if(isset($_POST['g-recaptcha-response'])){
            $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
            echo '<h2>Please check the the captcha form.</h2>';
            exit;
        }
        $secretKey = "";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
            echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {
            echo '<h2>Thanks for posting comment.</h2>';
        } */

        return redirect('category/goods/' . $goods->id);

    }
}
