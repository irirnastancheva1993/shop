<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = ['id', 'user_id', 'price'];

    public function goods()
    {
        return $this->belongsToMany(Goods::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
