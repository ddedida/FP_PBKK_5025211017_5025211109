<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class StandingController extends Controller
{
    public function standing()
    {
        $teamstats = Teamstatistic::with('team')
            ->orderByDesc('points')
            ->orderByDesc('goal_diff')
            ->orderBy('team_id')
            ->get();
        
        return view('user.tables', compact('teamstats'));
    }
}
