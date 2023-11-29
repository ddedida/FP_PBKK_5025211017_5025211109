<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    protected $fillable = [
        'season'
    ];

    public function teamstatistic()
    {
        return $this->hasMany(Teamstatistic::class, 'id', 'season_id');
    }
}
