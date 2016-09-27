<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['user_id', 'price'];

    public function goods()
    {
        return $this->belongsToMany(Goods::class);
    }
}
