<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';
    protected $fillable = ['user_id', 'product_id', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function commentreplys()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function caculateMinute()
    {
        $caculate = \Carbon\Carbon::now()->diffInMinutes($this->created_at);
        if ($caculate < 60) {
            return $caculate . 'phut';
        } elseif ($caculate > 60 && $caculate < 1440) {
            return (int)$caculate / 60 . ' gio';
        } else {
            return (int)($caculate / 1440) . ' ngay';
        }
    }
}
