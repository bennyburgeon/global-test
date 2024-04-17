<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateSkills extends Model
{
    use HasFactory;
    protected $table = 'candidate_skills';
    protected $fillable = [
      'skills',
      'candidate_id'
    ];
}
