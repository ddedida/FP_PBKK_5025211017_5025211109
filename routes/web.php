<?php

use App\Http\Controllers\ComentController;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandingController;
use App\Models\Game;

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
$teams = Team::all();
    return view('user.home', ['teams' => $teams]);
})->name('home');
Route::get('/tables', [StandingController::class, 'standing'])->name('tables');
Route::get('/fixtures', [MatchController::class, 'showFixtures'])->name('fixtures');
Route::get('/results', [MatchController::class, 'showResults'])->name('results');
Route::get('/teams', [TeamController::class, 'showTeams'])->name('teams');
Route::get('/each-team/{team}', [TeamController::class, 'showEachTeam'])->name('each-team');

// Navbar Dashboard Admin
Route::get('/game', [GameController::class, 'showGame'])->middleware(['auth', 'verified', 'admin'])->name('game');
Route::get('/update-table', [GameController::class, 'updateTable'])->middleware(['auth', 'verified', 'admin'])->name('update-table');
Route::get('/create-game', [GameController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('create-game');
Route::post('/create-game', [GameController::class, 'createGame'])->middleware(['auth', 'verified', 'admin'])->name('create-game');
Route::get('/edit-game/{game}', [GameController::class, 'showEditGame'])->middleware(['auth', 'verified', 'admin'])->name('edit-game');
Route::put('/edit-game/{game}', [GameController::class, 'editGame'])->middleware(['auth', 'verified', 'admin'])->name('edit-game');
Route::delete('/delete-game/{game}', [GameController::class, 'deleteGame'])->middleware(['auth', 'verified', 'admin'])->name('delete-game');


Route::get('/comment/{game}', [ComentController::class, 'create'])->name('comment');
Route::post('/comment/{game}', [ComentController::class, 'store']);
Route::delete('comment/{comment}', [ComentController::class, 'delete']);

Route::resource('/player', PlayerController::class);