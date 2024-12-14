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

Route::get('/player_show/{id}', [PlayerController::class, 'show']);
//http://127.0.0.1:8000/player_show/5
//Тут реализована связь многие-ко-многим и sql-запрос
Route::get('/matches_show/{id}', [MatchesController::class, 'show']);
//http://127.0.0.1:8000/matches_show/3
//все, что выше это 4 задание

Route::get('/team_index', [TeamController::class, 'index']);
//http://127.0.0.1:8000/team_index
//php artisan route:clear для очистки кэша. Можно передавать запросы с параметром,
// чтобы не отображалась страница по старому кэшу(из-за этого у меня не отображалась)

Route::get('/players', [PlayerController::class, 'index'])->name('players.index');// 4 задание было, но с 5 изменено
Route::get('/players/create', [PlayerController::class, 'create'])->name('player_create')->middleware('auth');;
Route::post('/players', [PlayerController::class, 'store'])->name('player_store');
Route::get('/players/{id}/edit', [PlayerController::class, 'edit'])->name('player_edit')->middleware('auth');;
Route::put('/players/{id}', [PlayerController::class, 'update'])->name('player_update')->middleware('auth');;
Route::delete('/players/{id}', [PlayerController::class, 'destroy'])->name('player_destroy')->middleware('auth');;

//http://127.0.0.1:8000/team_show/1   - отобразить Список игроков команды Аргентина
//http://127.0.0.1:8000/team_index   - отобразить Список команд:
//http://127.0.0.1:8000/player_show/14  - Футболист с ID:14
//http://127.0.0.1:8000/players    - Список игроков, с возможностью добавлять/удалять/редактировать
//http://127.0.0.1:8000/matches_show/4  - Игроки матча 4 забивших гол, Тут реализована связь многие-ко-многим и sql-запрос

Route::get('/login', [\App\Http\Controllers\LoginController::class, 'login']);
Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);
Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'authenticate']);
Route::get('/error', function (){    return view('error', ['message' => session('message')]);});
//http://127.0.0.1:8000/login
