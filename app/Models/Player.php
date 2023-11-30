<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    public function club(){
        return $this->belongsTo(Club::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
