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
        return view('admin.order.detail', compact('order'));
    }

    public function updateOrder($id, Request $request)
    {
        try {
            DB::beginTransaction();
            $status = $request->input('status_1');
            $order = Orders::find($id);
            $order->update(['status_1' => $status]);
            if ($status == '2') {
                foreach ($order->orderProducts as $orderProduct) {
                    $product = Product::findOrFail($orderProduct->product_id);
                    if ($product->quantity >= $orderProduct->product_qty) {
                        $product->update([
                            'pay' => $product->pay + $orderProduct->product_qty,
                            'quantity' => $product->quantity - $orderProduct->product_qty,
                        ]);
                    } else {
                        Session::flash('message', 'Hết hàng sang chỗ khác mà mua');
                        return redirect(route('list-don-hang'));
                    }
                }
            }
            DB::commit();
            Session::flash('message', 'Đã cập nhật đơn hàng thành công');
            return redirect(route('list-don-hang'));
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getDeleteOrder($id, Request $request)
    {
        $orders = Orders::find($id);
        $orders->delete();
        return redirect(route('list-don-hang'));
    }

    public function thongke()
    {
        $product_count = Product::count();
        $orders = Orders::where('status', 'pending')->get();
        $order_count = Orders::where('status', 'processing')->count();
        $ordered_count = Orders::where('status', 'completed')->count();
        $delayed_count = Orders::where('status', 'cancel')->count();
        return view('admin.order.thongke', compact('product_count', 'order_count', 'ordered_count', 'delayed_count', 'orders'));

//        $order_detail= DB::table('order_product')->join('orders', 'orders.id', '=', 'order_product.order_id')
//            ->join('products','products.id', '=', 'order_product.product_id')
//            ->where('orders.status','=','Đã xử lý')
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

    public function thongkesp()
    {
        $orders = Orders::all();
        $products = Product::where('pay', '>', 0)->latest()->get();
        foreach ($products as $product) {
            $total_price = 0;
            foreach ($product->order_product as $item) {
                if ($item->orders->status_1 == 2) {
                    $total_price += $item->product_price * $item->product_qty;
                }
            }
        }
        $data = [
            'products' => $products,
            'total_price' => $total_price,
            'ordera' => $orders,
        ];
        return view('admin.order.thongke', $data);
    }

    public function export()
    {
        return Excel::download(new OrderExport, 'thongke.xlsx');
    }

    public function changeStatus($id)
    {
        $order = Orders::findOrFail($id);
        switch ($order->status_1) {
            case 0:
                $order->update(['status_1' => 1]);
                break;
            case 1:
                $order->update(['status_1' => 2]);
                foreach ($order->orderProducts as $orderProduct) {
                    $product = Product::findOrFail($orderProduct->product_id);
                    if ($product->quantity >= $orderProduct->product_qty) {
                        $product->update([
                            'pay' => $product->pay + $orderProduct->product_qty,
                            'quantity' => $product->quantity - $orderProduct->product_qty,
                        ]);
                    } else {
                        return redirect(route('list-don-hang'));
                    }
                }
                break;
        }
        return back();
    }
}
