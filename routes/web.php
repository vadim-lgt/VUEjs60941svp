<?php

use App\Http\Controllers\MatchesController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});

Route::get('/hello', function () {
    return view('hello', ['title' => 'Hello World!']);
});
//php artisan serve запускать сервер!!!!!!!!!!
//В следующих 4 реализована связь один-ко-многим
Route::get('/team_show/{id}', [TeamController::class, 'show']);
//http://127.0.0.1:8000/team_show/4

Route::get('/team_index', [TeamController::class, 'index']);
//http://127.0.0.1:8000/team_index
//php artisan route:clear для очистки кэша. Можно передавать запросы с параметром,
// чтобы не отображалась страница по старому кэшу(из-за этого у меня не отображалась)

Route::get('/player_index', [PlayerController::class, 'index']);
//http://127.0.0.1:8000/player_index

//этот необязателен!!
Route::get('/player_show/{id}', [PlayerController::class, 'show']);
//http://127.0.0.1:8000/player_show/5

//Тут реализована связь многие-ко-многим и sql-запрос
Route::get('/matches_show/{id}', [MatchesController::class, 'show']);
//http://127.0.0.1:8000/matches_show/5
//все, что выше это 4 задание
