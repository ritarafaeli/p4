<?php

namespace App\Http\Controllers;

use App\Job;
use Auth;
use App\User;
use App\Guardian;
use Illuminate\Http\Request;

use App\Http\Requests;

class JobController extends Controller
{
    public function index(){
        //get all jobs
        $jobs = Job::all();
        //add user's profile picture to each job
        foreach($jobs as $job) {
            $guardian = Guardian::find($job->parent_id);
            $user = User::find($guardian->user_id);
            $job->user_profile_picture = $user->profile_picture;
        }
        return view('job.list')->with('jobs', $jobs);
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
        $guardian = Guardian::where('user_id',Auth::user()->id)->first();
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
        return view('job.show')->with('job', $job);
    }

    public function store(Request $request){
    }

    public function show($id){
        $job = Job::find($id);
        $guardian = Guardian::find($job->parent_id);
        $user = User::find($guardian->user_id);
        $job->user_name = $user->name;
        $job->user_email = $user->email;
        $job->user_profile_picture = $user->profile_picture;
        return view('job.show')->with('job', $job);
    }

    public function getMyJobs(){
        $user = Auth::user();
        $guardian = Guardian::where('user_id',$user->id)->first();
        if($guardian !== null) {
            $jobs = Job::where('parent_id', $guardian->id)->get();
            return view('job.all')->with('jobs', $jobs);
        }
        return view('welcome');
    }

    public function edit($id){
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
        $user = Auth::user();
        $job = Job::find($id);
        $guardian = Guardian::find($job->parent_id);
        if($guardian->id === $job->parent_id) {
            $job->delete();
        }
        $jobs = Job::where('parent_id', $guardian->id)->get();
        return view('job.all')->with('jobs', $jobs);
    }
}
