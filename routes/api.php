<?php

use App\Http\Controllers\MatchesControllerApi;
use App\Http\Controllers\PlayerControllerApi;
use App\Http\Controllers\TeamControllerApi;
use Illuminate\Support\Facades\Route;

Route::get('players', [PlayerControllerApi::class, 'index']);
//http://127.0.0.1:8000/api/players
Route::get('players/{id}', [PlayerControllerApi::class, 'show']);
//http://127.0.0.1:8000/api/players/4

Route::get('matches', [MatchesControllerApi::class, 'index']);
//http://127.0.0.1:8000/api/matches
Route::get('matches/{id}', [MatchesControllerApi::class, 'show']);
//http://127.0.0.1:8000/api/matches/4

Route::get('team', [TeamControllerApi::class, 'index']);
//http://127.0.0.1:8000/api/team
Route::get('team/{id}', [TeamControllerApi::class, 'show']);
//http://127.0.0.1:8000/api/team/4
