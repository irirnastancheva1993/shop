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
            'name' => 'required|max:255',
            'email' => 'required'
        ]);

        \DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect('/admin/users');

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);

        \DB::table('users')->insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);


        return redirect('/admin/users');
    }

    public function destroy($id)
    {

        \DB::table('users')->where('id', $id)->delete();

        return redirect('/admin/users');
    }
}
