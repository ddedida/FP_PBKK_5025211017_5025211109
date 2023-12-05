<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function showFixtures(Request $request)
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $seasonId = $request->input('season', $latestSeason->id);
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)
            ->with('team')
            ->get() : [];
        $seasons = Season::all();

        return view('user.fixtures', ['games' => $games, 'teamstats' => $teamstats, 'seasons' => $seasons, 'seasonId' => $seasonId]);
    }

    public function showResults(Request $request)
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $seasonId = $request->input('season', $latestSeason->id);
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)
            ->with('team')
            ->get() : [];
        $seasons = Season::all();

        // dd($teamstats);
        return view('user.results', ['games' => $games, 'teamstats' => $teamstats, 'seasons' => $seasons, 'seasonId' => $seasonId]);
    }
}
