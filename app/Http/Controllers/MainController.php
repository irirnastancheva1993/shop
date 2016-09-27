<?php
/**
 * Created by PhpStorm.
 * User: Ирка
 * Date: 14.09.2016
 * Time: 19:31
 */

namespace App\Http\Controllers;

use App\Users;


class MainController extends Controller
{
    public  function indexAction(){
        return view ('welcome');
    }

}