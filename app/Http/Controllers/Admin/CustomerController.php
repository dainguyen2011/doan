<?php

namespace App\Http\Controllers\Admin;

use App\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function listCustomer (){
        $cus = Customers::groupBy('email')->latest('created_at')->paginate(10);
        return view('admin.customer.list-customer', compact('cus'));
    }
//    public function deleteCustomer ($id, Request $request){
//        $cus = Customers::findOrFail($id);
//        $cus->delete();
//        return view('admin.customer.list-customer', compact('cus'));
//    }
    public function deleteCustomer($id, Request $request)
    {
        $cus = Customers::find($id);
        dd($cus);
        $cus->delete();
        return redirect(route('danh-sach-khach-hang'));
    }
}
