<?php

namespace App\Http\Controllers;

use Auth;
use App\Caregiver;
use App\User;
use App\UserInput;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CaregiverController extends Controller
{

    public function index(){
        $caregivers = DB::table('caregivers')
            ->select('caregivers.*','user_inputs.subcategory as education_level')
            ->leftJoin('user_inputs', 'caregivers.education_level_id', '=', 'user_inputs.id')->get();
        foreach($caregivers as $caregiver) {
            $user = User::find($caregiver->user_id);
            $caregiver->name = $user->name;
            $caregiver->email = $user->email;
            $caregiver->profile_picture = $user->profile_picture;
            $caregiver->last_login = $user->last_login;
            $caregiver->bio = str_limit($caregiver->bio, $limit = 180, $end = '...');
        }
        return view('caregiver.all')->with('caregivers', $caregivers);
    }
    public function show($id){
        $caregiver = Caregiver::where('id',$id)->first();
        $user = User::find($caregiver->user_id);
        $caregiver->name = $user->name;
        $caregiver->email = $user->email;
        $caregiver->profile_picture = $user->profile_picture;
        $caregiver->last_login = $user->last_login;
        return view('caregiver.single')->with('caregiver', $caregiver);
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
                'zip_code' => 'integer|max:99999',
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
