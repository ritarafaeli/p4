<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CaregiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caregivers = \App\Caregiver::all();

        foreach($caregivers as $caregiver) {
            $user = \App\User::find($caregiver->user_id);
            $caregiver->name = $user->name;
            $caregiver->email = $user->email;
            $caregiver->profile_picture = $user->profile_picture;
        }
        return view('caregivers')->with('caregivers', $caregivers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caregiver = new \App\Caregiver();
        //TODO: pull from request
        $caregiver->save();
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $caregiver = \App\Caregiver::where('id',$id)->get();
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $caregiver = \App\Caregiver::where('id',$user->id)->get();
            return view('profile')->with('caregiver', $caregiver);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user && !$user->is_parent) {
            $caregiver = \App\Caregiver::where('id', $user->id)->get();
            //TODO: pull from request
            $caregiver->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = Auth::user();

        $caregiver = \App\Caregiver::where('id',$user->id);
        $caregiver->delete();

        $user->delete();
    }
}
