<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Policies\CategoriesPolicy;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::all();
        return view('admin.categories', ['categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        \DB::table('categories')->where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect('/admin/categories');

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
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
