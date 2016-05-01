<?php

namespace App\Http\Controllers;

use App\Job;
use App\LanguageJob;
use Auth;
use App\User;
use App\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserInput;

use App\Http\Controllers\UserInputsController;

use App\Http\Requests;

class JobController extends Controller
{
    private $uic;

    public function __construct()
    {
        $this->uic = new UserInputsController();
    }
    public function index(){
        $jobs = DB::table('jobs')
            ->select('jobs.*','user_inputs.subcategory as education_level', 'users.name as name', 'users.email as email',
                'users.profile_picture as profile_picture', 'users.id as user_id')
            ->leftJoin('user_inputs', 'jobs.education_level_id', '=', 'user_inputs.id')
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->get();
        return view('job.list')->with('jobs', $jobs);
    }

    public function getCreateJobForm(){
        $rates = $this->uic->getHourlyRates();;
        $education_level = $this->uic->getEducationLevels();;
        $languages = $this->uic->getLanguages();;
        return view('job.create', ['hourly_rates'=> $rates, 'education_levels' => $education_level, 'languages' => $languages]);
    }
    
    public function create(Request $request){
        $this->validate($request, [
            'title' => 'required|max:50',
            'description' => 'required|max:500',
            'num_children' => 'required|min:1|max:7',
            'zip_code' => 'required|integer|max:99999',
            'hourly_rate_id' => 'required',
        ]);
        $user = Auth::user();
        $guardian = Guardian::where('user_id',$user->id)->first();
        if($guardian !== null) {
            $job = new Job();
            $job->setAttribute('parent_id', $guardian->id);
            $job->setAttribute('title', $request->get('title'));
            $job->setAttribute('description', $request->get('description'));
            $job->setAttribute('num_children', $request->get('num_children'));
            $job->setAttribute('zip_code', $request->get('zip_code'));
            $job->setAttribute('hourly_rate_id', $request->get('hourly_rate_id'));
            $job->setAttribute('education_level_id', $request->get('education_level_id'));
            $languages = $request->get('language_ids');
            $job->save();
            if($languages != null){
                foreach($languages as $val) {
                    $lang = new LanguageJob();
                    $lang->setAttribute('job_id', $job->getAttribute("id"));
                    $lang->setAttribute('language_id', $val);
                    $lang->save();
                }
            }
        }
        return $this->show($job->id);
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
        $languages = DB::table('language_jobs')
            ->select('user_inputs.subcategory as language')
            ->leftJoin('jobs', 'jobs.id', '=', 'language_jobs.job_id')
            ->leftJoin('user_inputs', 'language_jobs.language_id', '=', 'user_inputs.id')
            ->where('jobs.id',$id)
            ->get();
        return view('job.show', ['job' => $job, 'languages'=> $languages]);
    }

    public function search(Request $request){

    }
    public function filter(Request $request){

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
        $job = DB::table('jobs')
            ->select('jobs.*','user_inputs.subcategory as education_level', 'users.name as name', 'users.email as email',
                'users.profile_picture as profile_picture', 'users.id as user_id')
            ->where('jobs.id',$id)
            ->where('users.id',Auth::user()->id)
            ->leftJoin('user_inputs', 'jobs.education_level_id', '=', 'user_inputs.id')
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->first();
        if($job !== null){
            $rates = $this->uic->getHourlyRates();
            $education_level = $this->uic->getEducationLevels();
            $languages = $this->uic->getLanguages();
            $selected_languages = UserInput::where('jobs.id','=',$id)
                ->leftJoin('language_jobs', 'language_jobs.language_id', '=', 'user_inputs.id')
                ->leftJoin('jobs', 'jobs.id', '=', 'language_jobs.job_id')
                ->orderBy('category')->pluck('subcategory', 'user_inputs.id')->toArray();
            /*dump($languages);
            dump($selected_languages);*/
            return view('job.edit', ['job' => $job, 'hourly_rates'=> $rates, 'education_levels' => $education_level,
                'languages' => $languages, 'selected_languages' => $selected_languages]);
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
        $job = DB::table('jobs')
            ->select('jobs.*')
            ->where('jobs.id',$id)
            ->where('users.id',Auth::user()->id)
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->first();
        if($job !== null){
            $job = Job::find($id);
            $job->title = $request->get('title');
            $job->description = $request->get('description');
            $job->num_children = $request->get('num_children');
            $job->zip_code = $request->get('zip_code');
            $job->is_smoker = $request->get('is_smoker') !== null;
            $job->is_driver = $request->get('is_driver') !== null;
            $job->is_cpr_certified = $request->get('is_cpr_certified') != null;
            $job->hourly_rate_id = $request->get('hourly_rate_id');
            $job->education_level_id = $request->get('education_level_id');
            $job->save();
            $languages = $request->get('language_ids');
            if($languages != null){
                //delete all languages associated with job
                LanguageJob::where('job_id',$id)->delete();
                //add selected languages
                foreach ($languages as $key => $val) {
                    $lang = new LanguageJob();
                    $lang->setAttribute('job_id', $job->getAttribute("id"));
                    $lang->setAttribute('language_id', $val);
                    $lang->save();
                }
            }
            return $this->getMyJobs();
        }
        return $this->getMyJobs();
    }

    public function destroy($id){
        $job = DB::table('jobs')
            ->select('jobs.*')
            ->where('jobs.id',$id)
            ->where('users.id',Auth::user()->id)
            ->leftJoin('guardians', 'jobs.parent_id', '=', 'guardians.id')
            ->leftJoin('users', 'guardians.user_id', '=', 'users.id')
            ->first();
        if($job !== null) {
            $job = Job::find($id);
            $job->delete();
        }
        return $this->getMyJobs();
    }
}
