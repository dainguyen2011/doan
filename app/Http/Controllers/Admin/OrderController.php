<?php

namespace App\Http\Controllers\Admin;

use App\Exports\OrderExport;
use App\OrderProduct;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use \Session;

class OrderController extends Controller
{
    //
    public function getAllOrder(Request $request)
    {
        $orders = Orders::all();
        return view('admin.order.list_order', compact('orders'));
    }

    public function getOrderDetail($id, Request $request)
    {
        $order = Orders::find($id);
        $list_product = Orders::getAllProductByOrderId($id);
        return view('admin.order.detail', compact('order', 'list_product'));
    }

    public function updateOrder($id, Request $request)
    {
        $post = $request->all();
        $status = $post['status'];
        $order = Orders::find($id);
        $order->status = $status;
        $order->save();
        Session::flash('message', 'Đã cập nhật đơn hàng thành công');
        $list_product = Orders::getAllProductByOrderId($id);
        return redirect(route('list-don-hang'));
    }

    public function getDeleteOrder($id, Request $request)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect(route('list-don-hang'));
    }
    public function thongke(){
        $product_count = Product::count();
        $orders = Orders::where('status','pending')->get();
        $order_count = Orders::where('status','pending')->count();
        $ordered_count = Orders::where('status','completed')->count();
        $delayed_count = Orders::where('status','cancel')->count();
        return view('admin.order.thongke',compact('product_count','order_count','ordered_count','delayed_count','orders'));

//        $order_detail= DB::table('order_product')->join('orders', 'orders.id', '=', 'order_product.order_id')
//            ->join('products','products.id', '=', 'order_product.product_id')
//            ->where('orders.status','=','completed')
//            ->select('orders.id', 'order_product.product_id','order_product.product_qty','orders.created_at','products.product_name','products.quantity', DB::raw('SUM(order_product.product_qty) AS total'),DB::raw('SUM(total) AS money'))
//            ->groupBy('order_product.product_id')
//            ->orderBy('orders.created_at','desc')
//            ->get();

//        $order_detail=DetailOrder::with(['order'=>function($query){
//             $query->where('status',1);
//        }])->get();
//
//        $order_detail = DetailOrder::whereHas('order', function($q){
//            $q->where('status',1);
//        })->groupBy('product_id')->orderBy('created_at','desc')->get();
//        dd($order_detail);
//        return view('admin.order.thongke',compact('order_detail'));
    }
    public function thongkesp(){
        $order_detail= DB::table('order_product')->join('orders', 'orders.id', '=', 'order_product.order_id')
            ->join('products','products.id', '=', 'order_product.product_id')
            ->where('orders.status','completed')
//            ->where(date_format())
            ->select('orders.id', 'order_product.product_id','order_product.product_qty','orders.created_at','products.product_name','products.quantity', DB::raw('SUM(order_product.product_qty) AS total'),DB::raw('SUM(total) AS money'))
            ->groupBy('order_product.product_id')
            ->orderBy('orders.created_at','desc')
            ->get();
//        $order_detail=DetailOrder::with(['order'=>function($query){
//             $query->where('status',1);
//        }])->get();
//
//        $order_detail = DetailOrder::whereHas('order', function($q){
//            $q->where('status',1);
//        })->groupBy('product_id')->orderBy('created_at','desc')->get();
//        dd($order_detail);
        return view('admin.order.thongkesp',compact('order_detail'));
    }
    public function export()
    {
        return Excel::download(new OrderExport, 'thongke.xlsx');
    }
}
