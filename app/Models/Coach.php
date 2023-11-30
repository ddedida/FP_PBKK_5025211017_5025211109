<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;

    protected $fillable = [
        'coach_name',
        'date_of_birth',
        'team_id',
        'country_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
