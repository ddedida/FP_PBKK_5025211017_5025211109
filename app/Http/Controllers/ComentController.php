<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComentController extends Controller
{
    //
    public function create(Game $game)
    {
        //
        return view('user.comment',[
            'game' => $game,
            'comments' => Comment::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function store(Request $request, Game $game)
    {
        $validatedData = $request->validate([
            'body' => 'required'
        ]);

         $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        $validatedData['game_id'] = $game->id;
        $validatedData['user_id'] = auth()->user()->id;

        Comment::create($validatedData);


        return redirect()->route('comment', ['game' => $game->id]);

        //return $validatedData;
    }

    public function delete(Comment $comment)
    {
        Comment::destroy($comment->id);
        return redirect()->route('comment');
    }
}
