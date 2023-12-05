<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ComentController extends Controller
{
    public function create(Game $game)
    {
        if (auth()->user()) {
            return view('user.comment', [
                'game' => $game,
                'comments' => Comment::where('game_id', $game->id)->get()
            ]);
        }
        return redirect()->back();
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

        // return redirect()->route('comment', ['game' => $game->id]);
        return redirect()->back();
    }

    public function delete($id)
    {
        if (auth()->user()->id == Comment::find($id)->user_id || auth()->user()->is_admin == 1) {
            $comment = Comment::where('id', $id)->first();
            $comment->delete();
        }
        return redirect()->back();
    }

    public function edit(Comment $comment)
    {
        if (auth()->user()->id == $comment->user_id || auth()->user()->is_admin == 1) {
            return view('user.editcomment',[
                'target' => $comment,
                'comments' => Comment::where('user_id', auth()->user()->id)->get()
            ]);
        }
        return redirect()->back();
    }

    public function update(Request $request,Comment $comment)
    {
        $validatedData = $request->validate([
            'body' => 'required'
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');
        $validatedData['game_id'] = $comment->game_id;
        $validatedData['user_id'] = auth()->user()->id;
        Comment::where('id', $comment->id)->update($validatedData);
        return redirect()->route('comment', ['game' => $comment->game_id]);
    }
}
