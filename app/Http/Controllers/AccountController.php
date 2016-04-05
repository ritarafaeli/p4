<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;

class AccountController extends Controller
{
    public function updateAccount(Request $request){
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|max:255',
            'new_password' => 'min:6',
            'confirm_password' => 'min:6|same:new_password',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('old_password'),
        ];

        $user->name = $request->input('name');
        $user->profile_picture = $request->input('profile_picture');
        $pass = $request->input('new_password');
        if(Auth::validate($credentials)) {
            $user->password = bcrypt($request->input('new_password'));
            $user->save();
        }else if($pass === ''){
            $user->save();
        }
        return view('account');
    }
}