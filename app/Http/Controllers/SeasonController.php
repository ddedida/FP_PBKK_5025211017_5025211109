<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;

class SeasonController extends Controller
{
    public function showSeason(Request $request)
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
        
        return view('admin.season.show-season', compact('teamstats', 'seasons', 'seasonId', 'teams'));
    }

    public function createSeason(Request $request)
    {
        $incomingFields = $request->validate([
            'season' => 'required',
        ]);

        $incomingFields['season'] = strip_tags($incomingFields['season']);

        Season::create($incomingFields);

        return redirect()->route('show-season');
    }

    public function addTeamToSeason(Request $request, $seasonId)
    {
        $incomingFields = $request->validate([
            'team_id' => 'required|exists:teams,id',
        ]);

        $incomingFields['win'] = 0;
        $incomingFields['draw'] = 0;
        $incomingFields['lose'] = 0;
        $incomingFields['goal_for'] = 0;
        $incomingFields['goal_againts'] = 0;
        $incomingFields['goal_diff'] = 0;
        $incomingFields['points'] = 0;
        $incomingFields['played'] = 0;
        $incomingFields['season_id'] = $seasonId;
        $incomingFields['team_id'] = strip_tags($incomingFields['team_id']);

        if (Teamstatistic::where('season_id', $seasonId)->where('team_id', $incomingFields['team_id'])->exists()) {
            return redirect()->route('show-season', ['season' => $seasonId]);
        } else {
            Teamstatistic::create($incomingFields);
            return redirect()->route('show-season', ['season' => $seasonId]);
        }
    }
}
