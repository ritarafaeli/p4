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
        $jobs = Job::all();

        foreach($jobs as $job) {
            $guardian = Guardian::find($job->parent_id);
            $user = User::find($guardian->user_id);
            //$job->user_name = $user->name;
            //$job->user_email = $user->email;
            $job->user_profile_picture = $user->profile_picture;
        }
        return view('job.list')->with('jobs', $jobs);
    }

    public function create(){
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
        //dump($guardian);
        $jobs = Job::where('parent_id',$guardian->user_id);
        //dump($jobs);
        return view('job.all')->with('jobs', $jobs);
    }

    public function edit($id){
    }

    public function update(Request $request, $id){
    }

    public function destroy($id){
    }
}
