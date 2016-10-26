<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;

use App\Images;
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
        $goods = \DB::table('goods')->paginate(3);
//        $goods = Goods::all()->paginate(3);
        return view('admin.goods', ['goods' => $goods, 'categories' => $categories]);
    }

    public function index_add()
    {
        $categories = Categories::category();

        return view('admin.goods_add', ['categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        $goods = Goods::where('id', $id)->get();

        $name = 'name'.$id;
        $price = 'price'.$id;
        $image = 'image'.$id;
        $description = 'description'.$id;
        $article = 'article'.$id;
        $category_id = 'category_id'.$id;
        $count = 'count'.$id;

        foreach ($goods as $item){

            if($item->name != $request->$name){
                $this->validate($request, [
                    'name'.$id => 'required|unique:goods,name|max:255'
                ]);
            }
            if($item->price != $request->$price){
                $this->validate($request, [
                    'price'.$id => 'required|min:3|max:7',
                ]);
            }
            if($item->image != $request->$image){
                $this->validate($request, [
                    'image'.$id => 'required|url',
                ]);
            }
            if($item->description != $request->$description){
                $this->validate($request, [
                    'description'.$id => 'required',
                ]);
            }
            if($item->article != $request->$article){
                $this->validate($request, [
                    'article'.$id => 'required|unique:goods,article|min:8|max:14',
                ]);
            }
            if($item->category_id != $request->$category_id){
                $this->validate($request, [
                    'category_id'.$id => 'required',
                ]);
            }
            if($item->count != $request->$count){
                $this->validate($request, [
                    'count'.$id => 'required|min:1|max:2',
                ]);
            }
        }

//        $this->validate($request, [
//            'name' => 'required|unique:goods,name|max:255',
//            'price' => 'required|min:3|max:7',
//            'image' => 'required|url',
//            'description' => 'required',
//            'article' => 'required|min:8|max:14',
//            'categories_id' => 'required'
//        ]);

        \DB::table('goods')->where('id', $id)->update([
            'name' => $request->$name,
            'price' => $request->$price,
            'image' => $request->$image,
            'description' => $request->$description,
            'article' => $request->$article,
            'categories_id' => $request->$category_id,
            'count' => $request->$count
        ]);

        return back();

    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:goods,name|max:255',
            'price' => 'required|min:3|max:7',
            'image' => 'required|url',
            'description' => 'required',
            'article' => 'required|min:8|max:14',
            'categories_id' => 'required',
            'count' => 'required'
        ]);

        \DB::table('goods')->insertGetId([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image,
            'description' => $request->description,
            'article' => $request->article,
            'categories_id' => $request->categories_id,
            'count' => $request->count
        ]);

        return back()->with('message_create_good', 'Товар успешно добавлен!');
    }

    public function imageIndex($id)
    {
        $images = \DB::table('images')->select('goods_id', 'id', 'url')->where('goods_id', $id)->get();
//        var_dump($images);die;
        return view('admin.images', ['images' => $images]);
    }

    public function imageAdd($id, Request $request)
    {
//        var_dump($request->url, $id);die;
        $this->validate($request, [
            'url' => 'required|url|unique:images,url|',
        ]);

        \DB::table('images')->insertGetId([
            'goods_id' => $id,
            'url' => $request->url
        ]);
        return back()->with('message_create_image', 'Картинка к товару успешно добавлена!');
    }

    public function imageUpdate($id, Request $request)
    {
        $url = 'url'.$request->id;
        var_dump($url); die;

        $this->validate($request, [
            'url'.$id => 'required|url',
            ]);

        \DB::table('images')->where('goods_id', $id)->update([
            'url' => $request->$url
        ]);

        return back();
    }

    public function imageDelete($id)
    {
//        var_dump($id); die;
        \DB::table('images')->where('id', $id)->delete();

        return back();
    }


    public function destroy($id)
    {
        var_dump($id); die;
//        $this->authorize('destroy', $categories);

        \DB::table('goods')->where('id', $id)->delete();

        return back();
    }
}
