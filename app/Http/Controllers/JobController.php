<?php

namespace App\Http\Controllers;

use App\Job;
use Auth;
use App\User;
use App\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserInputsController;

use App\Http\Requests;

class JobController extends Controller
{
    public function index(){
        $jobs = DB::table('jobs')
            ->select('jobs.*', 'users.profile_picture as user_profile_picture')
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->get();
        return view('job.list')->with('jobs', $jobs);
    }

    public function getCreateJobForm(){
        $uic = new UserInputsController();
        $rates = $uic->getHourlyRates();;
        $education_level = $uic->getEducationLevels();;
        return view('job.create', ['hourly_rates'=> $rates, 'education_levels' => $education_level]);
    }
    
    public function create(Request $request){
        //validate request
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'num_children' => 'required|min:1|max:7',
            'zip_code' => 'required|integer|min:00501|max:99999',
            'hourly_rate_id' => 'required',
        ]);
        //get guardian
        $user = Auth::user();
        $guardian = Guardian::where('user_id',$user->id)->first();
        //create job
        if($guardian !== null) {
            $job = new Job();
            $job->setAttribute('parent_id', $guardian->id);
            $job->setAttribute('title', $request->get('title'));
            $job->setAttribute('description', $request->get('description'));
            $job->setAttribute('num_children', $request->get('num_children'));
            $job->setAttribute('zip_code', $request->get('zip_code'));
            $job->setAttribute('hourly_rate_id', $request->get('hourly_rate_id'));
            $job->setAttribute('education_level_id', $request->get('education_level_id'));
            $job->save();
        }
        $job->setAttribute('user_name',$user->name);
        $job->setAttribute('user_profile_picture',$user->profile_picture);
        $job->setAttribute('user_email',$user->email);
        return view('job.show')->with('job', $job);
    }

    public function store(Request $request){
    }

    public function show($id){
        $job = DB::table('jobs')
            ->select('jobs.*','user_inputs.subcategory as education_level', 'users.name as name', 'users.email as email',
                'users.profile_picture as profile_picture', 'users.id as user_id')
            ->where('jobs.id',$id)
            ->leftJoin('user_inputs', 'jobs.education_level_id', '=', 'user_inputs.id')
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->first();
        return view('job.show')->with('job', $job);
    }

    public function getMyJobs(){
        $user = Auth::user();
        $jobs = DB::table('jobs')
            ->select('jobs.*')
            ->where('users.id',$user->id)
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->get();
        return view('job.all')->with('jobs', $jobs);
    }

    public function edit($id){
        $job = Job::find($id);
        $guardian = Guardian::find($job->parent_id);
        if(Auth::user()->id === $guardian->user_id){
            $uic = new UserInputsController();
            $rates = $uic->getHourlyRates();;
            $education_level = $uic->getEducationLevels();;
            return view('job.edit', ['job' => $job, 'hourly_rates'=> $rates, 'education_levels' => $education_level]);
        }
        return view('welcome');
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'num_children' => 'required|min:1|max:7',
            'zip_code' => 'required|integer|min:00501|max:99999',
            'hourly_rate_id' => 'required',
        ]);
        $job = Job::find($id);
        $guardian = Guardian::find($job->parent_id);
        if(Auth::user()->id === $guardian->user_id){
            $job->setAttribute('title', $request->get('title'));
            $job->setAttribute('description', $request->get('description'));
            $job->setAttribute('num_children', $request->get('num_children'));
            $job->setAttribute('zip_code', $request->get('zip_code'));
            $job->setAttribute('is_smoker', $request->get('is_smoker') !== null);
            $job->setAttribute('is_driver', $request->get('is_driver') !== null);
            $job->setAttribute('is_cpr_certified', $request->get('is_cpr_certified') != null);
            $job->setAttribute('hourly_rate_id', $request->get('hourly_rate_id'));
            $job->setAttribute('education_level_id', $request->get('education_level_id'));
            $job->save();
            return $this->getMyJobs();
        }
        return view('welcome');
    }
    public function destroy($id){
        $user = Auth::user();
        $job = Job::find($id);
        $guardian = Guardian::find($job->parent_id);
        if($guardian->id === $job->parent_id) {
            $job->delete();
        }
        return $this->getMyJobs();
    }
}
