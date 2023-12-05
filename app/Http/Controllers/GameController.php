<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Season;
use App\Models\Comment;
use App\Jobs\UpdateTables;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function index()
    {
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $teamstats = ($latestSeason->id) ? Teamstatistic::where('season_id', $latestSeason->id)
            ->with('team')
            ->orderByDesc('points')
            ->orderByDesc('goal_diff')
            ->orderBy('team_id')
            ->get() : [];
        
        // dd($teamstats);

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
    public function showGame(Request $request)
    {
        $games = DB::table('games')->orderBy('date', 'asc')->get();
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $seasonId = $request->input('season', $latestSeason->id);
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)
            ->with('team')
            ->get() : [];
        $seasons = Season::all();

        return view('admin.game', ['games' => $games, 'teamstats' => $teamstats, 'seasons' => $seasons, 'seasonId' => $seasonId]);
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
        
        return view('admin.edit-game', ['games' => $game, 'teamstats' => $teamstats]);
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
    public function updateTable($seasonId)
    {
        dispatch(new UpdateTables($seasonId));

        return redirect()->route('game');
    }

    // Show Detail
    public function showDetail(Game $game)
    {
        $teamstats = Teamstatistic::with('team')->orderBy('team_id', 'asc')->get();
        $comments = Comment::where('game_id', $game->id)->get();

        return view('user.detail', ['games' => $game, 'teamstats' => $teamstats, 'comments' => $comments]);
    }
}
