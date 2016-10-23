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
//        $users = User::all();
        $users = \DB::table('users')->paginate(5);
        return view('admin.users', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->get();

        $name = 'name'.$id;
        $email = 'email'.$id;
        $password = 'password'.$id;

        foreach ($user as $item){

//            var_dump($item->name, $item->email);
//            echo "<br>";
//            var_dump($request->$name, $request->$email);die;

            if($item->name != $request->$name){
                $this->validate($request, [
                    'name'.$id => 'required|unique:users,name|max:255'
                ]);
            }
            if($item->email != $request->$email){
                $this->validate($request, [
                    'email'.$id => 'required|email|max:255|unique:users,email'
                ]);
            }
        }

        $this->validate($request, [
//            'name'.$id => 'required|unique:users,name|max:255',
//            'email'.$id => 'required|email|max:255|unique:users,email',
            'password'.$id => 'required|min:6'
        ]);

        \DB::table('users')->where('id', $id)->update([
            'name' => $request->$name,
            'email' => $request->$email,
            'password' => bcrypt($request->$password),
        ]);

        return back();
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

        return redirect('/admin/users/add')->with('message_create_user', 'Пользователь успещно добавлен');
    }

    public function destroy($id)
    {

        \DB::table('users')->where('id', $id)->delete();

        return back();
    }
}
