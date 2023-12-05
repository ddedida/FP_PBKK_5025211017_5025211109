<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class StandingController extends Controller
{
    public function standing(Request $request)
    {
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $seasonId = $request->input('season', $latestSeason->id);
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)
            ->with('team')
            ->orderByDesc('points')
            ->orderByDesc('goal_diff')
            ->orderBy('team_id')
            ->get() : [];
        $seasons = Season::all();
        $teams = Team::all();
        
        return view('user.tables', compact('teamstats', 'seasons', 'seasonId', 'teams'));
    }
}
