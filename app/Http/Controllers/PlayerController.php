<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.player.index',[
            'players' => Player::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.player.create',[
            'teams' => Team::all(),
            'countries' => Country::all(),
            'positions' => Position::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'player_name' => ['required', 'max:50'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:2002-01-01','after_or_equal:1978-01-01'],
            'height' => ['required','integer' ,'between:150,220'],
            'position_id' => ['required'],
            'team_id' => ['required'],
            'country_id' => ['required']
        ]);

        Player::create($validatedData);

        return redirect('player')->with('success', 'New Player has been assigned');


    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
        return view('admin.player.edit',[
            'player' => $player,
            'teams' => Team::all(),
            'countries' => Country::all(),
            'positions' => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Player $player)
    {
        //
        $validatedData = $request->validate([
            'player_name' => ['required', 'max:50'],
            'date_of_birth' => ['required', 'date', 'before_or_equal:2002-01-01','after_or_equal:1978-01-01'],
            'height' => ['required','integer' ,'between:150,220'],
            'position_id' => ['required'],
            'team_id' => ['required'],
            'country_id' => ['required']
        ]);

        Player::where('id', $player->id)->update($validatedData);

        return redirect('/player')->with('success', 'Player has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Player $player)
    {
        //
        Player::destroy($player->id);
        return redirect('/player')->with('success', 'Player has been deleted!');
    }
}
