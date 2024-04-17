<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateLocation extends Model
{
    use HasFactory;
    protected $table = 'candidate_location';
    protected $fillable = [
      'location_id',
      'candidate_id'
    ];

    public function city()
    {
        return $this->hasOne(City::class,'id','location_id');
    }
}
