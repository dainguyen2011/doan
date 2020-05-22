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
        \Mail::send('frontend.mail.contact-mail', compact('request'), function ($message) use ($request) {
            $message->to(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'))->subject
            ('Liên hệ');
            $message->from($request->email, $request->first_name . $request->last_name);
        });
        return redirect()->back()->with('lienhe', 'Cản ở bạn đã phản hồi về cho chúng tôi  !!!!!!');
    }
}

