<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Team;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    //
    public function index(){
        return view('clublist',[
            "clubs" => Team::orderBy('point', 'desc')->get()
        ]);
    }
}
