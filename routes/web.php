<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    \App\Jobs\Jobs1::dispatch();
    return view('welcome');
});

Route::get('/routingtest', function () {
    echo "Routing Test for Unit Testing";
});

Route::get('/json-test', function () {
    return response()->json([
        'name' => 'Dewangga',
        'updated' => true,
    ]);
});

Route::get('/club', [ClubController::class, 'index']);

Route::get('/player',[PlayerController::class, 'index']);