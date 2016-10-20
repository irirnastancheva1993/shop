<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Goods;
use App\Http\Requests;

class AdminProductsController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::category();
        $goods = Goods::all();
        return view('admin.goods', ['goods' => $goods, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:goods,name|max:255',
            'price' => 'required|min:3|max:7',
            'image' => 'required|url',
//            'description' => 'required',
//            'article' => 'required|min:8|max:14',
            'categories_id' => 'required'
        ]);

        \DB::table('goods')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
//            'description' => $request->description,
//            'article' => $request->article,
            'categories_id' => $request->categories_id
        ]);

        return redirect('/admin/goods');

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:goods,name|max:255',
            'price' => 'required|min:3|max:7',
            'image' => 'required|url',
            'description' => 'required',
            'article' => 'required|min:8|max:14',
            'categories_id' => 'required'

        ]);

        \DB::table('goods')->insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
            'article' => $request->article,
            'categories_id' => $request->categories_id
        ]);

        return redirect('/admin/goods');
    }

    public function destroy($id)
    {
//        $this->authorize('destroy', $categories);

        \DB::table('goods')->where('id', $id)->delete();

        return redirect('/admin/goods');
    }
}
