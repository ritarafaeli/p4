<?php

namespace App\Http\Controllers;
use App\UserInput;

use App\Http\Requests;

class UserInputsController extends Controller
{
    private $languages;
    private $education_levels;
    private $hourly_rates;

    public function __construct()
    {
        $this->languages = UserInput::where('category','Language')->orderBy('category')->pluck('subcategory', 'id');
        $this->education_levels = UserInput::where('category','Education')->pluck('subcategory', 'id');
        $this->hourly_rates = UserInput::where('category','HourlyRate')->pluck('subcategory', 'id');
    }
    public function getLanguages(){
        return $this->languages;
    }
    public function getEducationLevels(){
        return $this->education_levels;
    }
    public function getHourlyRates(){
        return $this->hourly_rates;
    }
    public function getSubcategoryById($id){
        return UserInput::find($id)->get();
    }
}
