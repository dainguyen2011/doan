<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use DB;
use Illuminate\Http\Request;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $sx = $request->sx;
        if (empty($sx)) {
            $aoclb_products = Product::where('category_id', 8)->orderBy('price', 'ASC')->get();
            $aodoituyen_products = Product::where('category_id', 9)->orderBy('price', 'ASC')->get();

            $aologo_products = Product::where('category_id', 10)->orderBy('price', 'ASC')->get();
        } else {
            $aoclb_products = Product::where('category_id', 8)->orderBy('price' * (100 - 'sale')/100, $sx)->get();
            $aodoituyen_products = Product::where('category_id', 9)->orderBy('price', $sx)->get();
            $aologo_products = Product::where('category_id', 10)->orderBy('price', $sx)->get();
        }
        return view('frontend.home.index', compact('aoclb_products', 'aodoituyen_products', 'aologo_products'));
    }
//        foreach ($aoclb_products as $item){
//            $item['price_sale'] =  $item->price * (100 - $item->sale) / 100;
//        }
//        $aoclb_products = $aoclb_products->sortByDesc('price_sale');
//        dd($aoclb_products);
}
