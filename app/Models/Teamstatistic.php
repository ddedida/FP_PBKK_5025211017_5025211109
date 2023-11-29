<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Season;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teamstatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'win',
        'draw',
        'lose',
        'goal_for',
        'goal_againts',
        'goal_diff',
        'played',
        'points',
        'season_id',
        'team_id'
    ];

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }
}
