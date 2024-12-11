<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
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
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
    {
        // Получаем всех игроков из базы данных
        return view('team_index', ['team_index' => Team::all()]);
        //1 представление(название); 2 переменная массива(массив переменных); 3 метод
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        return view('team_show', ['team_show' => Team::all()->where('id', $id)->first()]);
        //1 представление(название); 2 переменная массива(массив переменных); 3 метод
        // Находим игрока по ID и возвращаем его
    }
    //То что выше это для связи один ко многим
}
