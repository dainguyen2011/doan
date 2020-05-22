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
        $post = $request->all();
        $user = User::find($id);
        $user->phone = $post['phone'];
        $user->name = $post['name'];
        $user->full_name = $post['full_name'];
        $user->note = $post['note'];
        $user->gender = $post['gender'];
        if ($user->save()) {
            if ($request->hasFile('avatar')) {
                $file = $request->avatar;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name = $file->getClientOriginalName();
                $extension_file = $file->getClientOriginalExtension();
                $temp_file = $file->getRealPath();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $random = random_int(10000, 50000);
                $file->move('upload/products', $random . $file->getClientOriginalName());
                $user->avatar = "upload/products/" . $random . $file->getClientOriginalName();
                $user->save();
            }
        }

        return redirect(route('profile'))->with('success', 'Sửa thông tin thành công  !!!');;;
    }
}
