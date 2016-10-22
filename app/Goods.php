<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }

    public function specs()
    {
        return $this->belongsToMany(Specs::class);
    }

    protected $fillable = array('name', 'description', 'image', 'price', 'id', 'article', 'count');
}
