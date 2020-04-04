<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyComment extends Model
{
    protected $fillable = [
        'body',
        'product_id',
        'reply_id',
        'user_id'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
