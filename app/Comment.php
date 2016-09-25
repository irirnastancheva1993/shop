<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function goods(){
        return $this->belongsTo('App\Goods');
    }

    protected $fillable = array('text', 'goods_id');
}
