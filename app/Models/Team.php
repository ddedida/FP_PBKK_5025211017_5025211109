<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Player;
use App\Models\Teamstatistic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_name',
        'homebase',
        'city'
    ];

    public function teamstatistic()
    {
        return $this->hasMany(Teamstatistic::class, 'id', 'team_id');
    }

    public function player()
    {
        return $this->hasMany(Player::class, 'id', 'team_id');
    }

    public function coach()
    {
        return $this->hasMany(Coach::class, 'id', 'team_id');
    }
}
