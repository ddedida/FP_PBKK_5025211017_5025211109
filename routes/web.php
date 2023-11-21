<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\PlayerController;

Route::get('/', function () {
    \App\Jobs\Jobs1::dispatch();
    return view('welcome');
});

Route::get('/club', [ClubController::class, 'index']);

Route::get('/player',[PlayerController::class, 'index']);

// Testing

// Route::get('/routingtest', function () {
//     echo "Routing Test for Unit Testing";
// });

// Route::get('/json-test', function () {
//     return response()->json([
//         'name' => 'Dewangga',
//         'updated' => true,
//     ]);
// });