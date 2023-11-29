<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Coach;
use App\Models\Player;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;

class TeamController extends Controller
{
    public function showTeams(Request $request) {
        $seasonId = $request->input('season', '1');
        $teamstats = Teamstatistic::with('team')
            ->orderBy('team_id', 'asc')
            ->get();
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)->get() : [];
        $seasons = Season::all();

        return view('user.teams', compact('teamstats', 'seasons', 'seasonId'));
    }

    public function showEachTeam(Team $team) {
        $player = Player::all();
        $coach = Coach::all();
        
        return view('user.each-team', ['teams' => $team, 'players' => $player, 'coaches' => $coach]);
    }
}
