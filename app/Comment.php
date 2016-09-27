<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['text', 'user_name', 'goods_id'];

    public function goods()
    {
        return $this->belongsTo(Goods::class);
    }
}
