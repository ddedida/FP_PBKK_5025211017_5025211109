<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function showFixtures()
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $teams = Teamstatistic::with('team')->get();

        return view('user.fixtures', ['games' => $games, 'teams' => $teams]);
    }

    public function showResults()
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $teams = Teamstatistic::with('team')->get();

        return view('user.results', ['games' => $games, 'teams' => $teams]);
    }
}
