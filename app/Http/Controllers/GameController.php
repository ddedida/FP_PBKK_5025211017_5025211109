<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        $teamstats = Teamstatistic::with('team')->orderBy('team_id', 'asc')->get();

        return view('admin.create-game', ['teamstats' => $teamstats]);
    }

    // Create Game
    public function createGame(Request $request)
    {
        $incomingFields = $request->validate([
            'home-team' => 'required',
            'away-team' => 'required',
            'date' => 'required',
        ]);

        $seasons = Season::orderBy('id', 'desc')->first();

        $incomingFields['home_goal'] = null;
        $incomingFields['away_goal'] = null;
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['played'] = false;
        $incomingFields['season_id'] = $seasons->id;
        $incomingFields['home_teamstatistic_id'] = strip_tags($incomingFields['home-team']);
        $incomingFields['away_teamstatistic_id'] = strip_tags($incomingFields['away-team']);

        Game::create($incomingFields);

        return redirect()->route('game');
    }

    // Show Game
    public function showGame()
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $teams = Teamstatistic::with('team')->get();

        return view('admin.game', ['games' => $games, 'teams' => $teams]);
    }

    // Delete Game
    public function deleteGame(Game $game)
    {
        $game->delete();

        return redirect()->route('game');
    }

    // Show Edit Game
    public function showEditGame(Game $game)
    {
        $teamstats = Teamstatistic::with('team')->orderBy('team_id', 'asc')->get();

        $homeTeam = DB::table('games')
            ->join('teamstatistics', 'games.home_teamstatistic_id', '=', 'teamstatistics.id')
            ->join('teams', 'teamstatistics.team_id', '=', 'teams.id')->get();

        $awayTeam = DB::table('games')
            ->join('teamstatistics', 'games.away_teamstatistic_id', '=', 'teamstatistics.id')
            ->join('teams', 'teamstatistics.team_id', '=', 'teams.id')->get();
        
        // dd($homeTeam);

        return view('admin.edit-game', ['games' => $game, 'teamstats' => $teamstats, 'homeTeam' => $homeTeam, 'awayTeam' => $awayTeam]);
    }

    // Edit Game
    public function editGame(Request $request, Game $game)
    {
        $incomingFields = $request->validate([
            'home-team' => 'required',
            'away-team' => 'required',
            'home-goal' => 'required',
            'away-goal' => 'required',
            'date' => 'required',
            'played' => 'required',
        ]);

        $seasons = Season::orderBy('id', 'desc')->first();

        $incomingFields['home_goal'] = $incomingFields['home-goal'];
        $incomingFields['away_goal'] = $incomingFields['away-goal'];
        $incomingFields['date'] = strip_tags($incomingFields['date']);
        $incomingFields['played'] = $incomingFields['played'];
        $incomingFields['season_id'] = $seasons->id;
        $incomingFields['home_teamstatistic_id'] = strip_tags($incomingFields['home-team']);
        $incomingFields['away_teamstatistic_id'] = strip_tags($incomingFields['away-team']);

        $game->update($incomingFields);

        return redirect()->route('game');
    }

    // Update Table
    public function updateTable()
    {
        $games = Game::all();
        $teamstats = Teamstatistic::all();

        $gameCount = $games->count();

        // dd($gameCount);

        foreach ($teamstats as $teamstat) {
            $field['win'] = 0;
            $field['draw'] = 0;
            $field['lose'] = 0;
            $field['goal_for'] = 0;
            $field['goal_againts'] = 0;
            $field['goal_diff'] = 0;
            $field['played'] = 0;
            $field['points'] = 0;
            
            foreach ($games as $game) {
                if($game->played == 1) {
                    if ($teamstat->id == $game->home_teamstatistic_id) {
                        $field['goal_for'] += $game->home_goal;
                        $field['goal_againts'] += $game->away_goal;
                        $field['played'] += 1;
                        if ($game->home_goal > $game->away_goal) {
                            $field['win'] += 1;
                            $field['points'] += 3;
                        } else if ($game->home_goal < $game->away_goal) {
                            $field['lose'] += 1;
                        } else {
                            $field['draw'] += 1;
                            $field['points'] += 1;
                        }
                    } else if ($teamstat->id == $game->away_teamstatistic_id) {
                        $field['goal_for'] += $game->away_goal;
                        $field['goal_againts'] += $game->home_goal;
                        $field['played'] += 1;
                        if ($game->home_goal < $game->away_goal) {
                            $field['win'] += 1;
                            $field['points'] += 3;
                        } else if ($game->home_goal > $game->away_goal) {
                            $field['lose'] += 1;
                        } else {
                            $field['draw'] += 1;
                            $field['points'] += 1;
                        }
                    }
                }
            }

            $field['goal_diff'] = $field['goal_for'] - $field['goal_againts'];

            $teamstat->update($field);
        }

        return redirect()->route('game');
    }
}
