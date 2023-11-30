<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'home_goal',
        'away_goal',
        'date',
        'played',
        'season_id',
        'home_teamstatistic_id',
        'away_teamstatistic_id'
    ];

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    public function hometeamstatistic()
    {
        return $this->hasMany(Teamstatistic::class, 'id', 'home_teamstatistic_id');
    }

    public function awayteamstatistic()
    {
        return $this->hasMany(Teamstatistic::class, 'id', 'away_teamstatistic_id');
    }
}
