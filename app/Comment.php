<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'd.m.Y H:i:s';
    protected $fillable = [
        'product_id',
        'reply_id',
        'body',
        'user_id'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

//    public function children()
//    {
//        return $this->hasOne('App\Comment', 'reply_id');
//    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
//
//    public function replycomments()
//    {
//        return $this->hasMany('App\ReplyComment');
//    }

//    public function getChildren()
//    {
//        if ($this->children) {
//            return $this->children->body;
//        } else {
//            return null;
//        }
//    }
}
