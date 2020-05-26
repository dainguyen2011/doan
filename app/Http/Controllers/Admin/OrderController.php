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

    public function thongkesp()
    {
        $orders = Orders::all();
        $product_count = Product::count();
        $order_count = Orders::where('status_1', 0)->count();
        $ordered_count = Orders::where('status_1', 2)->count();
        $products = Product::where('pay', '>', 0)->latest()->get();
        $product_month = Product::where('pay', '>', 0)->where('updated_at', '>=', \Carbon\Carbon::now()->subMonth())->get();
        $month = \Carbon\Carbon::now()->month;
        $visitorTraffic = Orders::where('created_at', '>=', \Carbon\Carbon::now()->subMonth())
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get(array(
                DB::raw('Date(created_at) as date'),
                DB::raw('COUNT(*) as "pay"')
            ));
        $Moths = [];
        $Datas = [];
        $pay = [];
        $upd = [];
        foreach ($visitorTraffic as $item)
        {
            $Moths[] = $item->date;
            $Datas[] = $item->pay;
        }
        foreach ($product_month as $a) {
        $pay[] = $a->pay;
        $upd[] = \Carbon\Carbon::parse( $a->updated_at)->format('Y-m-d');
        }
        dd($upd);
        $data = [
            'upd' =>json_encode($upd),
            'pay' =>json_encode($pay),
            'products' => $products,
            'ordera' => $orders,
            'Months' => json_encode($Moths),
            'Data' => json_encode($Datas),
            'product_count' =>$product_count,
            'order_count'=>$order_count,
            'ordered_count' =>$ordered_count,
            'visitorTraffic' =>$visitorTraffic,
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

