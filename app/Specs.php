<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specs extends Model
{
    protected $fillable = ['id', 'name'];

    public function goods()
    {
        return $this->belongsToMany(Goods::class);
    }

}
