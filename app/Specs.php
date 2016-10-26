<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specs extends Model
{
    protected $fillable = ['goods_id', 'spacs_id', 'value'];

    public function goods()
    {
        return $this->belongsToMany(Goods::class);
    }

}
