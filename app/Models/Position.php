<?php

namespace App\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'position'
    ];

    public function player()
    {
        return $this->hasMany(Player::class, 'id', 'position_id');
    }
}
