<?php

namespace App\Http\Controllers;

use Auth;
use App\Caregiver;
use App\User;
use App\UserInput;
use App\LanguageCaregiver;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Http\Requests;

class CaregiverController extends Controller
{
    private $uic;

    public function __construct()
    {
        $this->uic = new UserInputsController();
    }

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

    public function edit(){
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $caregiver = Caregiver::where('user_id',$user->id)->first();
            $caregiver->zip_code = sprintf("%05d", $caregiver->zip_code);
            if($caregiver !== null) {
                $rates = $this->uic->getHourlyRates();
                $education_level = $this->uic->getEducationLevels();
                $languages = $this->uic->getLanguages();
                $selected_languages = UserInput::where('caregivers.id', '=', $caregiver->id)
                    ->leftJoin('language_caregivers', 'language_caregivers.language_id', '=', 'user_inputs.id')
                    ->leftJoin('caregivers', 'caregivers.id', '=', 'language_caregivers.caregiver_id')
                    ->orderBy('category')->pluck('subcategory', 'user_inputs.id')->toArray();
                return view('profile', ['caregiver' => $caregiver, 'hourly_rates' => $rates, 'education_levels' => $education_level,
                    'languages' => $languages, 'selected_languages' => $selected_languages]);
            }
        }
    }

    public function update(Request $request){
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $this->validate($request, [
                'bio' => 'max:1000',
                'age' => 'integer|between:16,100',
                'years_experience' => 'integer|between:0,100',
                'zip_code' => 'required|regex:/\b\d{5}\b/',
            ]);
            $caregiver = Caregiver::where('user_id', $user->id)->first();
            $caregiver->bio = $request->get('bio');
            $caregiver->zip_code = $request->get('zip_code');
            $caregiver->age = $request->get('age');
            $caregiver->years_experience = $request->get('years_experience');
            $caregiver->is_smoker = $request->get('is_smoker') !== null;
            $caregiver->is_driver = $request->get('is_driver') !== null;
            $caregiver->is_cpr_certified = $request->get('is_cpr_certified') !== null;
            $caregiver->is_experienced_infants = $request->get('is_experienced_infants') !== null;
            $caregiver->is_experienced_toddlers = $request->get('is_experienced_toddlers') !== null;
            $caregiver->is_experienced_preschoolers = $request->get('is_experienced_preschoolers') !== null;
            $caregiver->is_experienced_specialneeds = $request->get('is_experienced_specialneeds') !== null;
            $caregiver->save();
            $languages = $request->get('language_ids');
            if($languages != null){
                //delete all languages associated with caregiver
                LanguageCaregiver::where('caregiver_id',$caregiver->id)->delete();
                //add selected languages
                foreach($languages as $val) {
                    $lang = new LanguageCaregiver();
                    $lang->setAttribute('caregiver_id', $caregiver->id);
                    $lang->setAttribute('language_id', $val);
                    $lang->save();
                }
            }
            return $this->edit();
        }
    }

    public function destroy(){
        $user = Auth::user();
        $caregiver = Caregiver::where('user_id', $user->id)->first();
        $caregiver->delete();
        $user->delete();
    }
}
