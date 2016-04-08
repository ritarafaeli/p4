<?php

namespace App\Http\Controllers;

use Auth;
use App\Caregiver;

use Illuminate\Http\Request;

use App\Http\Requests;

class CaregiverController extends Controller
{

    public function index(){
        $caregivers = \App\Caregiver::all();

        foreach($caregivers as $caregiver) {
            $user = \App\User::find($caregiver->user_id);
            $caregiver->name = $user->name;
            $caregiver->email = $user->email;
            $caregiver->profile_picture = $user->profile_picture;
            $caregiver->user_id = $user->id;
        }
        return view('caregivers')->with('caregivers', $caregivers);
    }
    public function show($id){
        $caregiver = Caregiver::where('id',$id)->get();
    }

    public function edit(Request $request){
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $caregiver = Caregiver::where('user_id',$user->id)->first();
            return view('profile')->with('caregiver', $caregiver);
        }
    }

    public function update(Request $request){
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $this->validate($request, [
                'bio' => 'max:500',
                'zip_code' => 'size:5',
            ]);
            $caregiver = Caregiver::where('user_id', $user->id)->first();
            $caregiver->bio = $request->get('bio');
            $caregiver->zip_code = $request->get('zip_code');
            $caregiver->is_smoker = $request->get('is_smoker') !== null;
            $caregiver->is_driver = $request->get('is_driver') !== null;
            $caregiver->is_cpr_certified = $request->get('is_cpr_certified') !== null;
            $caregiver->save();
            return view('profile')->with('caregiver', $caregiver);
        }
    }

    public function destroy(){
        $user = Auth::user();
        $caregiver = Caregiver::where('user_id', $user->id)->first();
        $caregiver->delete();
        $user->delete();
    }
}
