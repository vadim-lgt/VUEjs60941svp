<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MatchesControllerApi;
use App\Http\Controllers\PlayerControllerApi;
use App\Http\Controllers\TeamControllerApi;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//1 задание!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
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
//1 задание!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

//2 задание!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Route::post('/login', [AuthController::class, 'login']);
//http://127.0.0.1:8000/api/login

////объединяем в то, что ниже!!!!!!!!!!!!!!!!!!!
//Route::middleware('auth:sanctum')->get('team/{id}', [TeamControllerApi::class, 'show']);
////http://127.0.0.1:8000/api/team/1 запрос аутентификации bearer token
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
////http://127.0.0.1:8000/api/user
//
//Route::middleware('auth:sanctum')->get('/logout', [AuthController::class, 'logout']);
////http://127.0.0.1:8000/api/logout
////объединяем в то, что ниже!!!!!!!!!!!!!!!!!!!

Route::middleware('auth:sanctum')->group(function () {
    // Маршрут для просмотра команды по id
    Route::get('/team/{id}', [TeamControllerApi::class, 'show']);
    // Проверка текущего пользователя
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    // Logout (деактивация токена)
    Route::get('/logout', [AuthController::class, 'logout']);
});

//2 задание!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
