<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\Candidate;
use App\Jobs\SendEmail;
use App\Models\CandidateSkills;
use App\Models\CandidateLocation;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        return view('candidate.layout.registration',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:candidates,email',
            'phone'=> 'required|numeric|digits_between:8,13|unique:candidates,phone',
            'experience'=>'required|numeric',
            'notice_period'=>'required|numeric',
            'skills'=>'required',
            'resume'=>'required|mimes:pdf,jpeg,doc,docx',
            'photo'=>'required|mimes:jpg,jpeg,png,bmp',
        ]);
        if($request->file('resume')) {
            $file = $request->file('resume');
            $resume_name = time().'_'.$file->getClientOriginalName();
            $location = 'files/resume';
            $file->move($location,$resume_name);
        }else{
            return redirect('registration.create')->with('error', 'Resume Not Found');
        }
        if($request->file('photo')) {
            $file = $request->file('photo');
            $photo_name = time().'_'.$file->getClientOriginalName();
            $location = 'files/image';
            $file->move($location,$photo_name);
        }else{
            return redirect('registration.create')->with('error', 'Image Not Found');
        }
        $candidate = new Candidate([
            'name' => request('name'),
            'email' => request('email'),
            'phone'=> request('phone'),
            'experience'=> request('experience'),
            'password'=> app('hash')->make(request('phone')),
            'notice_period'=> request('notice_period'),
            'resume'=>$resume_name,
            'photo'=>$photo_name,
        ]);
        $candidate->save();
        $candidateSkills=explode(",",request('skills'));
        foreach($candidateSkills as $candidateSkill){
            $candidate_skills = new CandidateSkills([
                'skills' => $candidateSkill,
                'candidate_id' => $candidate->id,
            ]);
            $candidate_skills->save();
        }
        $candidateLocation=request('city_id');
        foreach($candidateLocation as $locations){
            $candidate_location = new CandidateLocation([
                'location_id' => $locations,
                'candidate_id' => $candidate->id,
            ]);
            $candidate_location->save();
        }
        $details = ['email' => $candidate->email];
        SendEmail::dispatch($details);
        return redirect('login');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cities = City::all();
        $candidate = Candidate::find(decrypt($id));
        $locations_array = $candidate->locations->pluck('location_id')->toArray();
        return view('candidate.edit-profile',compact('cities','candidate','locations_array'));
          
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=> 'required|email|unique:candidates,email,' .$id,
            'phone'=> 'required|numeric|digits_between:8,13|unique:candidates,phone,' .$id,
            'experience'=>'required|numeric',
            'notice_period'=>'required|numeric',
            'skills'=>'required',
        ]);
        if($request->file('resume')) {
            $file = $request->file('resume');
            $resume_name = time().'_'.$file->getClientOriginalName();
            $location = 'files/resume';
            $file->move($location,$resume_name);
        }else{
            $resume_name=auth()->guard('candidate')->user()->resume;
        }
        if($request->file('photo')) {
            $file = $request->file('photo');
            $photo_name = time().'_'.$file->getClientOriginalName();
            $location = 'files/image';
            $file->move($location,$photo_name);
        }else{
            $photo_name=auth()->guard('candidate')->user()->photo;
        }
        $candidate = Candidate::find($id);
        $candidate->name =request('name');
        $candidate->email =request('email');
        $candidate->phone =request('phone');
        $candidate->experience =request('experience');
        $candidate->notice_period =request('notice_period');
        $candidate->resume =$resume_name;
        $candidate->photo =$photo_name;
        $candidate->save();
        $candidateSkills=explode(",",request('skills'));
        CandidateSkills::where('candidate_id', $candidate->id)->delete();
        foreach($candidateSkills as $candidateSkill){
            $candidate_skills = new CandidateSkills([
                'skills' => $candidateSkill,
                'candidate_id' => $candidate->id,
            ]);
            $candidate_skills->save();
        }
        $candidateLocation=request('city_id');
        CandidateLocation::where('candidate_id', $candidate->id)->delete();
        foreach($candidateLocation as $locations){
            $candidate_location = new CandidateLocation([
                'location_id' => $locations,
                'candidate_id' => $candidate->id,
            ]);
            $candidate_location->save();
        }
        return redirect('candidate-dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
