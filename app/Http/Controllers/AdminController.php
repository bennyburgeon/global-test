<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\City;
class AdminController extends Controller
{
    public function adminDashboard(){
        return view('admin.dashboard');
    }
    public function candidatesList(){
        $lists = Candidate::where('status',1);
        $cities = City::all();
        if(request('name')){
            $search_key['name']=request('name');
         $lists =$lists->where('name', 'like', '%'.request('name').'%');  
        }
        if(request('email')){
            $search_key['email']=request('email');
            $lists =$lists->where('email', 'like', '%'.request('email').'%') ;  
           }
           if(request('min_exp')){
            $search_key['min_exp']=request('min_exp');
            $lists =$lists->where('experience', '<=', request('min_exp')) ;  
           }
           if(request('max_exp')){
            $search_key['max_exp']=request('max_exp');
            $lists =$lists->where('experience', '>=', request('max_exp')) ;  
           }
           if(request('req_skills')){
            $search_key['req_skills']=request('req_skills');
                $keyword=request('req_skills');
                $lists =$lists->whereHas('skills', function ($query) use ($keyword) {
                                    $query->where('skills', 'like', '%' . $keyword . '%');
                                });   
           }
           if(request('city_id')){
            $search_key['city_id']=request('city_id');
            $keyword2=request('city_id');
                            $lists =$lists->whereHas('locations', function ($query) use ($keyword2) {
                                 $query->whereIn('location_id',$keyword2);
                             });   
            }
            $lists=$lists->get();

        return view('admin.candidate-list',compact('lists','cities','search_key'));
    }
    public function candidateDashboard(){
        return view('candidate.dashboard');
    }
}
