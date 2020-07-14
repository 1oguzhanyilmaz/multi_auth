<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('front.profile', compact('user'));
    }

    public function profileUpdate(Request $request){
        $user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();
        $param = [
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'city' => $request->input('city'),
        ];

        $user->userDetail->update($param);

        return redirect()->back()->with('status', 'Güncelleme Başarılı');
    }
}
