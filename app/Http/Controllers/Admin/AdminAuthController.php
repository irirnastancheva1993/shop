<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminAuthController extends Controller
{
    use AuthenticatesAdmin;

    protected $redirectTo = '/shop/public/admin/main';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
    }
}
