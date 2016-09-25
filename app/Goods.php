<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function categories() {
        return $this->belongsTo('App\Categories');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    protected $fillable = array('name', 'description', 'image', 'price', 'id', 'article');
}
