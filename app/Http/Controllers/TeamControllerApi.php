<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamControllerApi extends Controller
{
    public function index()
    {
        return response()->json(Team::all());
    }

    public function show(string $id)
    {
        $team = Team::find($id); // ищем команду по id
        if (!$team) { // если команды с таким id нет
            return response()->json(['error' => 'Team not found'], 404); // возвращаем ошибку 404
        } // если команды с таким id нет
        return response()->json(Team::find($id));
    }

    public function store(Request $request)
    {
        //
    }
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
