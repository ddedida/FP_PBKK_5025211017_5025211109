<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Coach;
use App\Models\Player;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Models\Teamstatistic;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function showTeams(Request $request) {
        $latestSeason = Season::orderBy('id', 'desc')->first();
        $seasonId = $request->input('season', $latestSeason->id);
        $teamstats = ($seasonId) ? Teamstatistic::where('season_id', $seasonId)->with('team')->get() : [];
        $seasons = Season::all();

        return view('user.teams', compact('teamstats', 'seasons', 'seasonId'));
    }

    public function showEachTeam(Team $team) {
        $player = Player::where('team_id', $team->id)->get();
        $coach = Coach::where('team_id', $team->id)->get();

        return view('user.each-team', ['teams' => $team, 'players' => $player, 'coaches' => $coach]);
    }

    public function showTeamInAdmin(Request $request) {
        $teams = Team::all();

        return view('admin.team.show-team', ['teams' => $teams]);
    }

    // Create Team
    public function createTeam(Request $request) {
        $incomingFields = $request->validate([
            'team_name' => 'required',
            'homebase' => 'required',
            'city' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageFile = $request->file('image');
        $fileName  = date('Y-m-d').$imageFile->getClientOriginalName();
        $path      = 'team-logo/'.$fileName;

        Storage::disk('public')->put($path, file_get_contents($imageFile));

        $incomingFields['team_name'] = strip_tags($incomingFields['team_name']);
        $incomingFields['homebase'] = strip_tags($incomingFields['homebase']);
        $incomingFields['city'] = strip_tags($incomingFields['city']);
        $incomingFields['image'] = $fileName;

        Team::create($incomingFields);

        return redirect()->route('show-team');
    }

    // Edit Team
    public function showEditTeam(Team $team) {
        return view('admin.team.edit-team', ['teams' => $team]);
    }

    public function editTeam(Request $request, Team $team) {
        $incomingFields = $request->validate([
            'team_name' => 'required',
            'homebase' => 'required',
            'city' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);


        if($request->file('image')) {
            if($team->image) {
                Storage::disk('public')->delete('team-logo/'.$team->image);
            }
            $imageFile = $request->file('image');
            $fileName  = date('Y-m-d').$imageFile->getClientOriginalName();
            $path      = 'team-logo/'.$fileName;

            Storage::disk('public')->put($path, file_get_contents($imageFile));
            $incomingFields['image'] = $fileName;
        }


        $incomingFields['team_name'] = strip_tags($incomingFields['team_name']);
        $incomingFields['homebase'] = strip_tags($incomingFields['homebase']);
        $incomingFields['city'] = strip_tags($incomingFields['city']);

        $team->update($incomingFields);

        return redirect()->route('show-team');
    }

    // Delete Team
    public function deleteTeam(Team $team) {
        if($team->image) {
            Storage::disk('public')->delete('team-logo/'.$team->image);
        }
        $team->delete();

        return redirect()->route('show-team');
    }
}