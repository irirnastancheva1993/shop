<?php

namespace App\Http\Controllers\Admin;

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
        $goods = Goods::all();
        return view('admin.goods', ['goods' => $goods]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'required',
//            'description' => 'required',
//            'article' => 'required',
        ]);

        \DB::table('goods')->where('id', $id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
//            'description' => $request->description,
//            'article' => $request->article,
        ]);

        return redirect('/admin/goods');

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required',
            'image' => 'required',
            'description' => 'required',
            'article' => 'required',
        ]);

        \DB::table('goods')->insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
            'article' => $request->article,
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
