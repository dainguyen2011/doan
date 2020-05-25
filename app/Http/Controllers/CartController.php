<?php

namespace App\Http\Controllers;

use App\Customers;
use App\Orders;
use App\Product;
use Illuminate\Http\Request;
use \Cart;
use \DB;
use \Session;

class CartController extends Controller
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

    public function postPayNow(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'address' => 'required',
        ]);

        $post = $request->all();
        $customers = new Customers();
        $customers->first_name = $post['first_name'];
        $customers->last_name = $post['last_name'];
        $customers->phone_number = $post['phone_number'];
        $customers->address = $post['address'];
        $customers->save();


//        dd(str_replace(',', '', Cart::subtotal(0, 3)));
        $order = new Orders();
        $order->customer_id = $customers->id;
        $order->total = str_replace(',', '', Cart::subtotal(0, 3));
        $order->status_1 = 0;
        $order->paid = str_replace(',', '',session('pay') ) ;
        $order->save();
        $order_id = $order->id;

        foreach (Cart::content() as $item) {
            DB::table('order_product')->insert(
                array(
                    'product_id' => $item->id,
                    'order_id' => $order_id,
                    'product_name' => $item->name,
                    'product_size' => $item->options->size,
                    'product_price' => $item->price,
                    'product_qty' => $item->qty,

                )
            );
        }
        Cart::destroy();
        Session::flash('message', 'Bạn đã mua hàng thành công, cảm ơn bạn');
        session()->forget('pay');
        session(['pay', 0]);
        return redirect(route('home'));
    }

    public function postAddToCart($id, Request $request)
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
        return redirect(route('gio-hang'));
    }
}
