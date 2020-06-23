<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Requests\CommentRequest;
use App\CommentReply;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function addComment($id, Request $request)
    {
        if (auth()->user()) {
            Comment::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'product_id' => $id,
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('thongbao', 'bạn phải đăng nhập để bình luận');
        }

    }

    public function replycomment($comment_id, $product_id, Request $request)
    {
        if (auth()->user()) {
            CommentReply::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'product_id' => $product_id,
                'comment_id' => $comment_id,
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('thongbao', 'bạn phải đăng nhập để bình luận');
        }
    }
    public function replycommentuser($comment_id, $product_id,$reply_id,$cp_id, Request $request)
    {

        if (auth()->user()) {
            CommentReply::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'product_id' => $product_id,
                'comment_id' => $comment_id,
                'user_reply_id'=>$reply_id,
                'comment_reply_id'=>$cp_id,
            ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('thongbao', 'bạn phải đăng nhập để bình luận');
        }
    }
    public function create()
    {

    }
//    public function produceShow()
//    {
//        $produce=Produce::first();
//        $product=Product::limit(6)->get();
//        return view('fronend.asset.produce',compact('produce','product'));
//    }
    public function destroyComment($id)
    {
        $comment=Comment::find($id);
        if(auth()->user()->id==$comment->user->id){
            CommentReply::where('comment_id',$comment->id)->delete();
            $comment->delete();
        }
        return redirect()->back();

    }
    public function delete($id){
        $comment_reply=CommentReply::find($id);
        if(auth()->user()->id==$comment_reply->user->id){
            $comment_reply->delete();
        }
        return redirect()->back();
    }
}
