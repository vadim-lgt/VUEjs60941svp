<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerControllerApi extends Controller
{
    public function index()
    {
        return response()->json(Player::all());
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $player = Player::find($id);//если игрока с таким id нет
        if (!$player) {//если игрока с таким id нет
            return response()->json(['error' => 'Player not found'], 404);//если игрока с таким id нет
        }//если игрока с таким id нет
        return response()->json(Player::find($id));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
