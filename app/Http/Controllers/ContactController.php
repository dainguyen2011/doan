<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class ContactController extends Controller
{
    public function view()
    {
        return view("frontend.contact.index");
    }

    public function postcontact(Request $request)
    {
//        dd($request->all());
        \Mail::send('frontend.mail.contact-mail', compact('request'), function ($message) use ($request) {
            $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))->subject
            ('Liên hệ');
            $message->from($request->email, $request->first_name . $request->last_name);
        });

//        Contact::create([
//
//            'first_name' => $request->first_name,
//            'last_name' => $request->last_name,
//            'email' => $request->email,
//            'phone' => $request->phone,
//            'message' => $request->message,
//        ]);
        return redirect()->back()->with('lienhe', 'Cản ở bạn đã phản hồi về cho chúng tôi  !!!!!!');
    }
}

