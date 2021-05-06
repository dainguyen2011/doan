<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingRequest;
use App\Orders;
use App\Product;
use App\Category;
use App\Rating;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function gioithieu()
    {
        return view('frontend.gioithieu');
    }

//    public function danhmuc(Request $request)
//    {
//        $sx = $request->input('sx', 'ASC');
//        $categories = Product::where('category_id', $sx)->orderBy('price', $sx)->get();
//        return view('frontend.danhmuc', compact('categories'));
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        $sx = $request->input('sx', 'ASC');
        $aoclb_products = Product::where('category_id', 8)->orderBy('price', $sx)->get();
        $aodoituyen_products = Product::where('category_id', 9)->orderBy('price', $sx)->get();
        $new_products = Product::when($sx, function ($qr) use ($sx) {
            $qr->orderBy('price', $sx);
        })->get()->take(5);
        $aologo_products = Product::where('category_id', 10)->orderBy('price', $sx)->get();
        foreach ($aoclb_products as $item) {
            $item['price_sale'] = $item->price * (100 - $item->sale) / 100;
        }
        $aoclb_products = $aoclb_products->sortBy('price_sale');
        if ($sx == 'DESC') {
            $aoclb_products = $aoclb_products->sortByDesc('price_sale');
        }

        return view('frontend.home.index', compact('aoclb_products', 'aodoituyen_products', 'aologo_products', 'new_products', 'categories'));
    }

    public function getOrder(Request $request)
    {
        $order_id = $request->input('order_id');
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone = $request->input('phone');
        $order = Orders::where('id', $order_id)
            ->WhereHas('customer', function ($qr) use ($phone, $first_name, $last_name) {
                $qr->where('phone_number', $phone)->where('first_name', $first_name)->where('last_name', $last_name);
            })
            ->first();

        $data = [
            'order_id' => $order_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'order' => $order,

        ];
        return view('frontend.detail.detail-order', $data);
    }

    public function productStar($id, RatingRequest $request)
    {
        $product = Product::findOrFail($id);
        Rating::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'rating' => $request->input('rating'),
            'content' => $request->input('content')
        ]);
        return back();

    }

    public function listRate($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $persons = $product->rating->count();
        $rating = Rating::where('product_id', $product->id)->latest()->paginate(10);
        return view('frontend.detail.list-rate', compact('product', 'rating', 'persons'));

    }

    public function deleteOrder($id, Request $request)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect(route('home'));
    }
}
