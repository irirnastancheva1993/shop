<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Categories extends Model
{
    public function goods() {
        return $this->hasMany(Goods::class);
    }

    static function category()
    {
        $categories = Categories::all();
        return $categories;
    }
}
