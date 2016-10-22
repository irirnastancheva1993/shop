<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
//use Illuminate\Contracts\Validation\Factory;
//use Illuminate\Validation\Validator;
//use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\Controller;

class LoginController extends Controller

{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.login');
    }

    protected function login(Request $request)
    {

        $this->validate($request, [
            'name' => 'required', 'password' => 'required',
        ]);

        if (\Auth::attempt(['name'=>$request['name'],'password'=>$request['password'], 'is_admin'=>1]))
        {
            $request->session()->put('admin', $request['name']);
            return redirect('admin/main');
        }

        return redirect()->back();

    }

}
