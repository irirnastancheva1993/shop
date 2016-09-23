<?php
/**
 * Created by PhpStorm.
 * User: Ирка
 * Date: 14.09.2016
 * Time: 19:31
 */

namespace App\Http\Controllers;
use DB;
use App\Http\Controllers\Controller;
use App\Goods;
use App\Users;
use App\Orders;
use App\Categories;

class MainController extends Controller
{
    public  function indexAction(){
        return view ('welcome');
    }

    public  function getMain(){
        return view ('main');
    }

    public  function aboutusAction(){
        return view ('aboutus');
    }

    public  function getAllGood(){
        $goods = Goods::all();
        foreach ($goods as $good){
            echo "Goods is: " . $good->name . " " . $good->article . "<br>";
        }
    }

    public  function getGood($id){
        $goods = Goods::where('id', $id)->get();
        foreach ($goods as $good){
            echo "<h3>Good is: " . $good->name . "<br>Article is: " . $good->article . "</h3>";
        }
    }

    public function getAllUsers(){
        $users = Users::all();
        echo "<table border='1'><th>Name</th><th>Email</th>";
        foreach ($users as $user){
            echo "<tr><td>" . $user->name . "</td><td>" . $user->email . "</td></tr>";
        }
        echo "</table>";
    }

    public  function getUser($id){
        $users = Users::where('id', $id)->get();
        foreach ($users as $user){
            echo "<h3>User name is: " . $user->name . "<br>Email: " . $user->email . "</h3>";
        }

    }
}