<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
    ];

    public function player()
    {
        return $this->hasMany(Player::class, 'id', 'country_id');
    }

    public function coach()
    {
        return $this->hasMany(Coach::class, 'id', 'country_id');
    }
}
