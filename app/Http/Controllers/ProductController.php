<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Galleries;
use App\Product;
use App\Rating;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function getDetailProduct($id, Request $request)
    {
        $product = Product::find($id);
        $product->update(['views' => $product->views + 1]);
        $avg_stars = round($product->rating->avg('rating'));
        $persons =$product->rating->count();
        $detailGall = $product->gallery;
        $product_related = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->limit(8)->get();
        $rating = Rating::where('product_id', $product->id)->take(5)->latest()->get();
        return view('frontend.detail.product', compact('product','product_related', 'detailGall', 'avg_stars','persons', 'rating'));
    }


    public function getProductsById($id, Request $request)
    {
        $products = Product::where('category_id', '=', $id)->orderBy('sale_price')->paginate(6);
        $category = Category::find($id);
        $list_sub_category = Category::query()->where('parent', '=', $category->parent)->get();
        return view('frontend.allproduct.list_product', compact('category', 'products', 'list_sub_category'));
    }

    public function getSearch(Request $request)
    {
        $search = Product::where('product_name', 'like', '%' . $request->input('key') . '%')->get();

        return view('frontend.search.search', compact('search'));
    }

    public function xoaGalery($id, Request $request)
    {
        $product = Galleries::find($id);
        $product->delete();
        return redirect(route('list-don-hang'));
    }
}
