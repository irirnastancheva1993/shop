<?php

namespace App\Http\Controllers;

use App\Specs;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Goods;
use App\Categories;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categories::category();
        return view('home', compact('categories'));
    }

    public function about()
    {
        $categories = Categories::category();
        return view('pages.aboutus', compact('categories'));
    }

    public  function welcome(){
        return view ('welcome');
    }

    public function mainInfo(){
        $goods = \DB::table('goods') ->paginate(6);
//        $filtr = \DB::table('goods__specs')->select('specs_id', 'value')->distinct()->get();
//        var_dump($filtr); die;
        $brand = \DB::table('goods__specs')->select('value')->where('specs_id', 18)->distinct()->orderBy('value', 'asc')->get();
        $diam = \DB::table('goods__specs')->select('value')->where('specs_id', 13)->distinct()->orderBy('value', 'asc')->get();
        $count_v = \DB::table('goods__specs')->select('value')->where('specs_id', 17)->distinct()->orderBy('value', 'asc')->get();
        $m = \DB::table('goods__specs')->select('value')->where('specs_id', 16)->distinct()->orderBy('value', 'asc')->get();
        $material = \DB::table('goods__specs')->select('value')->where('specs_id', 19)->distinct()->get();
        $images = [];
        foreach ($goods as $good){
            $url_image = \DB::table('images')->select('url')->where('goods_id', $good->id)->first();
//            $j = \DB::table('images')->select('goods_id')->distinct()->get();
//            var_dump($j); die;
            $url = $url_image->url;
//            var_dump($url_image->url); die;
//            foreach ($url_image as $item)
//            var_dump($good->id); die;
            $images[] = ['id' => $good->id, 'url' => $url];
        }
        return view('main', ['goods' => $goods, 'images' => $images, 'brand' => $brand, 'diam' => $diam, 'count_v' => $count_v, 'm' => $m, 'material' => $material]);
    }

    public function result(/*Goods $goods,*/ Request $request)
    {

        $intersect = [];
        $goods = \DB::table('goods')->select('id')->get();
        for($i = 0; $i < count($goods); $i++){
            $intersect[$i] = $goods[$i]->id;
        }
//        var_dump($intersect); die;

        $goods_m = [];
        $goods_count_v = [];
        $goods_diam = [];
        $goods_brands = [];
        $goods_material = [];
        $goods_result = [];
        $goods_id_diam = [];
        $goods_id_brands = [];
        $goods_id_m = [];
        $goods_id_count_v = [];
        $goods_id_material = [];
        $brand = [];
        $diam = [];
        $m =[];
        $material =[];
        $count_v = [];

        if(!empty($request->brand)){
            for ($i = 0; $i < count($request->brand); $i++){
                $goods_brands[] = \DB::table('goods__specs')->select('goods_id')->where('value',$request->brand[$i])->get();
                $brand[$i] = $request->brand[$i];
            }
            // Метод collapse сворачивает коллекцию массивов в плоскую коллекцию:
            $collection_brands = collect($goods_brands)->collapse()->all();

            for($i = 0; $i < count($collection_brands); $i++){
                $goods_id_brands[] = $collection_brands[$i]->goods_id;
            }
            $intersect = array_intersect($intersect, $goods_id_brands);

        }

        if(!empty($request->diam)){
            for ($i = 0; $i < count($request->diam); $i++){
                $goods_diam[] = \DB::table('goods__specs')->select('goods_id')->where('value',$request->diam[$i])->get();
                $diam[$i] = $request->diam[$i];
            }
            $collection_diam = collect($goods_diam)->collapse()->all();
            for($i = 0; $i < count($collection_diam); $i++){
                $goods_id_diam[] = $collection_diam[$i]->goods_id;
            }
            $intersect = array_intersect($intersect, $goods_id_diam);
        }

        if(!empty($request->m)){
            for ($i = 0; $i < count($request->m); $i++){
                $goods_diam[] = \DB::table('goods__specs')->select('goods_id')->where('value',$request->m[$i])->get();
                $m[$i] = $request->m[$i];
            }
            $collection_m = collect($goods_m)->collapse()->all();
            for($i = 0; $i < count($collection_m); $i++){
                $goods_id_m[] = $collection_m[$i]->goods_id;
            }
            $intersect = array_intersect($intersect, $goods_id_m);
        }

        if(!empty($request->count_v)){
            for ($i = 0; $i < count($request->count_v); $i++){
                $goods_count_v[] = \DB::table('goods__specs')->select('goods_id')->where('value',$request->count_v[$i])->get();
                $count_v[$i] = $request->count_v[$i];
            }
            $collection_count_v = collect($goods_count_v)->collapse()->all();
            for($i = 0; $i < count($collection_count_v); $i++){
                $goods_id_count_v[] = $collection_count_v[$i]->goods_id;
            }
            $intersect = array_intersect($intersect, $goods_id_count_v);
        }

        if(!empty($request->material)){
            for ($i = 0; $i < count($request->material); $i++){
                $goods_material[] = \DB::table('goods__specs')->select('goods_id')->where('value',$request->material[$i])->get();
                $material[$i] = $request->material[$i];
            }
            $collection_material = collect($goods_material)->collapse()->all();
            for($i = 0; $i < count($collection_material); $i++){
                $goods_id_material[] = $collection_material[$i]->goods_id;
            }
            $intersect = array_intersect($intersect, $goods_id_material);
        }

        $filtr = ['Бренд' => $brand, 'Диаметр колеса(дюйм)' => $diam, 'Масса' => $m, 'Количество скоростей' => $count_v, 'Материал изгоровления' => $material];
            foreach($intersect as $key => $value){
                $goods_id = $value;
//                var_dump($goods_id);die;
                $goods_result[$key]= \DB::table('goods')->where('id', $goods_id)->get();
            }
//            var_dump($goods_result);die;
            $images = [];
            $url_image = [];

            foreach($goods_result as $item => $good){
                foreach ($good as $key => $value)
                    $url_image = \DB::table('images')->select('url')->where('goods_id', $value->id)->first();
                $images[] = ['id' => $value->id, 'url' => $url_image->url];
            }

//            var_dump($filtr); die;
        return view('filtr', ['goods_result' => $goods_result, 'images' => $images, 'filtr' => $filtr]);
    }




    public function search(Request $request)
    {
        // Строим запрос
        $goods = \DB::table('goods')->where('name', 'like', '%' . $request->search . '%')->get();
        // Получаем результаты
//        var_dump($goods); die;
        return view('search', ['goods' => $goods]);
    }

}
