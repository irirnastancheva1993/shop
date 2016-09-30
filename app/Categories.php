<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\DB;
use DB;


class Categories extends Model
{
    protected $fillable = ['id', 'name'];

    public function goods() {
        return $this->hasMany(Goods::class);
    }

    static function category()
    {
        $categories = Categories::all();
        return $categories;
//        $categories = [];
//        $data = DB::table('categories')->select('id', 'name')->get();
//        foreach ($data as $value)
//        {
//            $categories[] = [
//                'id' => $value->id,
//                'name' => $value->name
//            ];
//        }
//        return $categories;
    }
}
