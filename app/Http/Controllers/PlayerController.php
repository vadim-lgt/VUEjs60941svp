<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Здесь реализована связь один-ко-многим

    /*Метод index: Используется для отображения списка всех записей (например, всех команд, всех игроков и т.д.).
   Это основной метод для отображения коллекции данных.

   Метод show: Используется для отображения конкретной записи по ID.
   Например, показывать детали одной команды или одного игрока.
   Этот метод обычно принимает идентификатор записи и показывает информацию об этой конкретной записи.*/
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        //return view('routes', ['routes' => Route::all()]);
        return view('player_index', ['player_index' => Player::all()]);
        //1 представление(название); 2 переменная массива(массив переменных); 3 метод
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
       return view('player_show', ['player_show' => Player::all()->where('id', $id)->first()]);
       //1 представление(название); 2 переменная массива(массив переменных); 3 метод
    }
    //То что выше это для связи один ко многим
}
