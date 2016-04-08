<?php

namespace App\Http\Controllers;
use App\UserInput;

use App\Http\Requests;

class UserInputsController extends Controller
{
    public function getLanguages(){
        return UserInput::where('category','Language')->orderBy('category')->pluck('subcategory', 'id');
    }
    public function getEducationLevels(){
        return UserInput::where('category','Education')->pluck('subcategory', 'id');
    }
    public function getHourlyRates(){
        return UserInput::where('category','HourlyRate')->pluck('subcategory', 'id');
    }
    public function getSubcategoryById($id){
        return UserInput::find($id)->pluck('subcategory');
    }
}
