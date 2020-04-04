<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function view()
    {
        return view("frontend.contact.index");
    }

    public function postcontact(Request $request)
    {
        Contact::create([

            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);
        return redirect()->back()->with('lienhe', 'Cản ở bạn đã phản hồi về cho chúng tôi  !!!!!!');
    }
}

