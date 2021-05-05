<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Http\Requests\AddToCartRequest;
use App\Http\Requests\PostPayNowRequest;
use App\OrderProduct;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use \Cart;
use \DB;
use \Session;

class  CartController extends Controller
{
    //
    public function index()
    {
        return view("frontend.shoppingcart.cart");
    }

    public function payNow()
    {
        $carts = Cart::content();
        $price_pay = session('pay');
        foreach ($carts as $cart) {
            $product = Product::findOrFail($cart->id);
            if ($product->quantity < $cart->qty) return redirect()->back()->with('warning', 'Số lượng sản phẩm trong kho không đủ, vui lòng giảm số lượng sản phẩm !!!');
            else return view("frontend.checkout.index", compact('price_pay'));
        }
    }

    public function postPayNow(PostPayNowRequest $request)
    {
        $customer = Customers::where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->where('phone_number', $request->phone_number)
            ->where('address', $request->address)
            ->where('email', $request->email)->first();
        if (!$customer) {
            $new_customer = Customers::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'address' => $request->address,
            ]);
        }
        $order = Orders::create([
            'status_1' => 0,
            'paid' => str_replace(',', '', session('pay')),
            'customer_id' => $customer ? $customer->id : $new_customer->id,
            'total' => str_replace(',', '', Cart::subtotal(0, 3))
        ]);
        if ($order) {
            foreach (Cart::content() as $item) {
                OrderProduct::insert([
                    'product_id' => $item->id,
                    'order_id' => $order->id,
                    'product_name' => $item->name,
                    'product_size' => $item->options->size,
                    'product_price' => $item->price,
                    'product_qty' => $item->qty,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                ]);
            }
        }
        $order_id = $order->id;
        \Mail::send('frontend.mail.abcd', compact('request', 'order_id'), function ($message) use ($request) {
            $message->to($request->email, $request->first_name . $request->last_name)->subject
            ('Thanh toán');
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
        });
        Cart::destroy();
        session()->forget('pay');
        session(['pay', 0]);
        return view("frontend.pay-success", compact('customer', 'order', 'order_id'));
    }

    public function postAddToCart($id, AddToCartRequest $request)
    {
        $product = Product::find($id);
        $post = $request->all();
        $price = $product->getPrice();
        $product->size = $request->product_size;

        Cart::add([
            'id' => $id,
            'name' => $product->product_name,
            'qty' => $post['quality'],
            'price' => $price,
            'options' => ['size' => $product->size]
        ]);
        return redirect(route('gio-hang'));
    }

    public function removeItemCart($id, Request $request)
    {
        Cart::remove($id);
        return redirect(route('gio-hang'))->with('success','Bạn đã xóa thành công !!');
    }
    public function update_cart_quality(Request $request){
        $rowId = $request->rowId_cart;
        $qty= $request->cart_quality;
        Cart::update($rowId,$qty);
        return redirect(route('gio-hang'))->with('success','Bạn đã cập nhật giỏ hàng thành công !!');
    }
}
