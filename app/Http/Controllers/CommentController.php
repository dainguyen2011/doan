<?php

namespace App\Http\Controllers;

use App\Galleries;


use Illuminate\Http\Request;
use App\Comment;
use App\Product;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
//    public function comment($id, ReplyCommentRequest $request)
//    {
//        $product = Product::findOrFail($id);
//
//        Comment::create([
//            'product_id' => $product->id,
//            'user_id' => auth()->user()->id,
//            'body' => $request->body,
//        ]);
//
//        return back()->with('thongbao', 'Bình luận thành công,cảm ơn bạn dã phản hồi !!!!!!');
//        return view('frontend.detail.product', compact('product', 'detailGall', 'comments'))->with('thongbao', 'Bình luận thành công');
//    }
//    public function reply(ReplyCommentRequest $request, $product_id, $comment_id){
//
//        Comment::create([
//            'user_id' => auth()->user()->id,
//            'reply_id' =>$comment_id,
//            'product_id' =>$product_id,
//            'body' =>$request->body,
//        ]);
//        return back()->with('thongbao', 'Trả lời bình luận thành công,cảm ơn bạn dã phản hồi !!!!!!');
//    }

}
