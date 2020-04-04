<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getprofile()
    {
        $user = Auth::user();
        return view('frontend.user.profile', compact('user'));
    }

    function geteditprofile()
    {
        $profile = Auth::user();
        return view('frontend.user.edit_profile', compact('profile'));
    }

    function getpostprofile(UserRequest $request)
    {
        $id = Auth::user()->id;

        $user = User::where('id', $id);


        $user->update([
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'name' => $request->name,
            'full_name' => $request->full_name,
            'note' => $request->note,
            'gender' => $request->gender,
        ]);


        return redirect(route('profile'))->with('sua', 'Sửa thành công,cảm ơn bạn  !!!!!!');
    }
}
