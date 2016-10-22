<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    public function __construct()
    {
//        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6'
        ]);

        \DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/main');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users,name|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6'
        ]);

        \DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'api_token' => str_random(60),
            'password' => bcrypt($request->password),
        ]);

        return redirect('/admin/users');
    }

    public function destroy($id)
    {

        \DB::table('users')->where('id', $id)->delete();

        return redirect('/admin/users');
    }
}
