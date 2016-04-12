<?php

namespace App\Http\Controllers;
use Auth;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
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
            'profile_picture' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('old_password'),
        ];
        $user->name = $request->input('name');
        $pass = $request->input('new_password');

        $image = $request->file('profile_picture');
        if ($image !== null){
            //delete old image if exists
            if($user->profile_picture!==null){
                File::delete($user->profile_picture);
            }

            //rename and resize photo
            $image = Input::file('profile_picture');
            $filename  = time() . $image->getClientOriginalName();
            $relative_path = 'assets/img/profile_picture/'. $filename;
            $absolute_path = public_path($relative_path);
            Image::make($image->getRealPath())->resize(200, 200)->save($absolute_path);
            $user->profile_picture = $relative_path;
        }

        if(Auth::validate($credentials)) {
            $user->password = bcrypt($request->input('new_password'));
            $user->save();
        }else if($pass === ''){
            $user->save();
        }
        return view('account');
    }
}