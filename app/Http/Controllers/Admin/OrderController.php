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
        $orders = Orders::latest('updated_at')->paginate(10);
        return view('admin.order.list_order', compact('orders'));
    }

    public function getOrderDetail($id, Request $request)
    {
        $order = Orders::find($id);
        return view('admin.order.detail', compact('order'));
    }
    public function printOrder ($id, Request $request)
    {
        $order = Orders::find($id);
        $date_bill = \Carbon\Carbon::now();
        foreach ($order->orderProducts as $a){
            $ten_ao = $a->product->product_name;
            $so_luong = $a->product_qty;
        }
        return view('admin.order.print_order', compact('order','ten_ao','so_luong','date_bill'));
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

    public function thongkesp(Request $request)
    {
        $month = $request->month ? $request->month : \Carbon\Carbon::now()->month;
        $orders = Orders::all();
        $product_count = Product::count();
        $order_count = Orders::where('status_1', 0)->count();
        $ordered_count = Orders::where('status_1', 2)->count();
        $bbb = OrderProduct::latest('product_qty')->whereDay('updated_at', \Carbon\Carbon::now())->first();
//        dd(\Carbon\Carbon::now()->month);
        dd($bbb);
        $products = OrderProduct::with('product', 'orders')->when($request->month, function ($qr) use ($request) {
            $qr->whereMonth('updated_at', $request->month);
        })
            ->where('product_qty', '>', 0)
            ->latest()->get();
        $product_month = OrderProduct::with('orders')->when($request->month, function ($qr) use ($request) {
            $qr->whereMonth('created_at', $request->month);
        })
            ->where('product_qty', '>', 0)->oldest('created_at')
            ->get();
        $grouped = $product_month->groupBy(function ($item, $key) {
            return \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
        })->toArray();
        $tonkho = DB::table('products')->sum('quantity');
        $pay = [];
        $upd = [];
        foreach ($grouped as $key => $a) {
            $upd[] = \Carbon\Carbon::parse($key)->format('Y-m-d');
            $total_pay = 0;
            foreach ($a as $item) {
                if ($item['product_qty'] && $item['orders']['status_1'] == 2) $total_pay += ($item['product_qty'] * $item['product_price']);
            }
            array_push($pay, $total_pay);
        }

        $data = [
            'upd' => json_encode($upd),
            'pay' => json_encode($pay),
            'products' => $products,
            'ordera' => $orders,
            'product_count' => $product_count,
            'order_count' => $order_count,
            'tonkho' => $tonkho,
            'ordered_count' => $ordered_count,
            'month' => $month

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

