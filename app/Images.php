<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = ['id', 'goods_id', 'url'];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
