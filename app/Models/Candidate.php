<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Candidate extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'candidates';
    protected $fillable = [
      'name',
      'email',
      'phone',
      'experience',
      'password',
      'notice_period',
      'resume',
      'photo',
      'created_by',
    ];
    
    public function locations()
    {
        return $this->hasMany(CandidateLocation::class,'candidate_id','id');
    }
    public function skills()
    {
        return $this->hasMany(CandidateSkills::class,'candidate_id','id');
    }
    public function getAllSkillsAttribute(){
      $skills=[];
      foreach ($this->skills as $child) {
        array_push($skills,$child->skills) ;
      }
      return $skills ? implode(',', $skills) : "";
    }
    public function getAllLocationAttribute(){
      $locations=[];
      foreach ($this->locations as $location) {
        array_push($locations,$location->city->name) ;
      }
      return $locations ? implode(',', $locations) : "";
    }
    protected $appends = ['all_skills','all_location'];

}
