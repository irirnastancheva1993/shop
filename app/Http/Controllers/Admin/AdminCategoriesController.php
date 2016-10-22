<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Policies\CategoriesPolicy;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
//        var_dump(session()->has('admin')); die;
//        if (!empty(session()->has('admin'))){
//            return redirect('/admin/log');
//        }
    }

    public function index()
    {
        $categories = \DB::table('categories')->paginate(5);
//        $categories = Categories::all()->paginate(3);
        return view('admin.categories', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'.$id => 'required|unique:categories,name|max:255',
        ]);
        $name = 'name'.$id ;
        \DB::table('categories')->where('id', $id)->update([
            'name' => $request->$name,
        ]);

        return redirect('/admin/categories');

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name|max:255',
        ]);

        \DB::table('categories')->insertGetId([
            'name' => $request->name,
        ]);
        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
//        $this->authorize('destroy', $categories);

        \DB::table('categories')->where('id', $id)->delete();
        return redirect('/admin/categories');
    }
}
