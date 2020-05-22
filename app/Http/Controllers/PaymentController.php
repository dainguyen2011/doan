<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
/** Paypal Details classes **/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{
    private $api_context;

    /**
     ** We declare the Api context as above and initialize it in the contructor
     **/
    public function __construct()
    {
        $this->api_context = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        $this->api_context->setConfig(config('paypal.settings'));
    }

    public function getCheckout()
    {
        $price = round(str_replace(',', '', \Cart::subtotal(0, 3)) / 23295.03, 2);
        return view('checkout-page', compact('price'));
    }

    public function createPayment(Request $request)
    {
        $request->validate(['amount' => 'required|numeric']);
        $pay_amount = $request->amount;
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item = new Item();
        $item->setName('Paypal Payment')->setCurrency('USD')->setQuantity(1)->setPrice($pay_amount);
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($pay_amount);
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)
            ->setDescription('Laravel Paypal Payment Tutorial');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('confirm-payment'))
            ->setCancelUrl(url()->current());
        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $ex) {
            return back()->withError('Một số lỗi xảy ra, xin lỗi vì sự bất tiện');
        } catch (Exception $ex) {
            return back()->withError('Một số lỗi xảy ra, xin lỗi vì sự bất tiện');
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        if (isset($redirect_url)) {
            return redirect($redirect_url);
        }
        return redirect()->back()->withError('Xảy ra lỗi không xác định được');
    }

    /**
     ** This method confirms if payment with paypal was processed successful and then execute the payment,
     ** we have 'paymentId, PayerID and token' in query string.
     **/
    public function confirmPayment(Request $request)
    {
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect('/checkout')->withError('Thanh toán không thành công.');
        $payment = Payment::get($request->query('paymentId'), $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
        $result = $payment->execute($execution, $this->api_context);
        if ($result->getState() != 'approved') {
            return redirect('/checkout')->withError('Thanh toán không thành công.');
        }
        session(['pay' => \Cart::subtotal(0, 3)]);
        return redirect('/thanh-toan')->with('success', 'Thanh toán online thành công, vui lòng nhập đầy đủ thông tin vào hóa đơn !!!');
    }
}
