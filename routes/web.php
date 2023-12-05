<?php

use App\Models\Game;
use App\Models\Team;
use App\Models\Season;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandingController;
use App\Models\Teamstatistic;

// Laravel Breeze
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Navbar User
Route::get('/', function () {
    $latestSeason = Season::orderBy('id', 'desc')->first();
    $teamstats = Teamstatistic::where('season_id', $latestSeason->id)
        ->orderBy('team_id')
        ->get();
    return view('user.home', ['teamstats' => $teamstats]);
})->name('home');
Route::get('/tables', [StandingController::class, 'standing'])->name('tables');
Route::get('/fixtures', [MatchController::class, 'showFixtures'])->name('fixtures');
Route::get('/results', [MatchController::class, 'showResults'])->name('results');
Route::get('/teams', [TeamController::class, 'showTeams'])->name('teams');
Route::get('/each-team/{team}', [TeamController::class, 'showEachTeam'])->name('each-team');
Route::get('/detail/{game}', [GameController::class, 'showDetail'])->name('detail');

// Admin: Game
Route::get('/game', [GameController::class, 'showGame'])->middleware(['auth', 'verified', 'admin'])->name('game');
Route::get('/update-table/{season}', [GameController::class, 'updateTable'])->middleware(['auth', 'verified', 'admin'])->name('update-table');
Route::get('/create-game', [GameController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('create-game');
Route::post('/create-game', [GameController::class, 'createGame'])->middleware(['auth', 'verified', 'admin'])->name('create-game');
Route::get('/edit-game/{game}', [GameController::class, 'showEditGame'])->middleware(['auth', 'verified', 'admin'])->name('edit-game');
Route::put('/edit-game/{game}', [GameController::class, 'editGame'])->middleware(['auth', 'verified', 'admin'])->name('edit-game');
Route::delete('/delete-game/{game}', [GameController::class, 'deleteGame'])->middleware(['auth', 'verified', 'admin'])->name('delete-game');

// Admin: Player
Route::resource('/player', PlayerController::class)->middleware(['auth', 'verified', 'admin']);

// Admin: Season
Route::get('/show-season', [SeasonController::class, 'showSeason'])->middleware(['auth', 'verified', 'admin'])->name('show-season');
Route::get('/create-season', function () { return view('admin.season.create-season'); })->middleware(['auth', 'verified', 'admin'])->name('create-season');
Route::post('/create-season', [SeasonController::class, 'createSeason'])->middleware(['auth', 'verified', 'admin'])->name('create-season');
Route::post('/add-team-to-season/{season}', [SeasonController::class, 'addTeamToSeason'])->middleware(['auth', 'verified', 'admin'])->name('add-team-to-season');

// Admin: Team
Route::get('/show-team', [TeamController::class, 'showTeamInAdmin'])->middleware(['auth', 'verified', 'admin'])->name('show-team');
Route::get('/create-team', function () { return view('admin.team.create-team'); })->middleware(['auth', 'verified', 'admin'])->name('create-team');
Route::post('/create-team', [TeamController::class, 'createTeam'])->middleware(['auth', 'verified', 'admin'])->name('create-team');
Route::get('/edit-team/{team}', [TeamController::class, 'showEditTeam'])->middleware(['auth', 'verified', 'admin'])->name('edit-team');
Route::put('/edit-team/{team}', [TeamController::class, 'editTeam'])->middleware(['auth', 'verified', 'admin'])->name('edit-team');
Route::delete('/delete-team/{team}', [TeamController::class, 'deleteTeam'])->middleware(['auth', 'verified', 'admin'])->name('delete-team');

// User: Comment
Route::get('/comment/{game}', [ComentController::class, 'create'])->name('comment');
Route::post('/comment/{game}', [ComentController::class, 'store']);
Route::delete('comment/{comment}', [ComentController::class, 'delete']);
Route::get('/comment/{comment}/edit',[ComentController::class, 'edit']); 
Route::put('comment/{comment}',[ComentController::class, 'update']);