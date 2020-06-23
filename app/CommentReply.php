<?php

namespace App;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    protected $table = 'comment_replys';
    protected $fillable = ['user_id', 'comment_id', 'name', 'product_id', 'user_reply_id', 'comment_reply_id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function userrep()
    {
        return $this->belongsTo(User::class, 'user_reply_id');
    }

    public function caculateMinute()
    {
        $caculate = Carbon::now()->diffInMinutes($this->created_at);
        if ($caculate < 60) {
            return $caculate . 'phut';
        } elseif ($caculate > 60 && $caculate < 1440) {
            return $caculate / 60 . 'gio';
        } else {
            return $caculate / 1440 . 'ngay';
        }
    }
}
