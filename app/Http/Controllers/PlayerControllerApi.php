<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(
            DB::table('player')
                ->join('teams', 'player.team_id', '=', 'teams.id')
                ->select(
                    'player.id',
                    'player.Full_name',
                    'player.role',
                    'teams.name as team_name'
                )
                ->orderBy('player.id', 'asc')
                ->limit($request->perpage ?? 5)
                ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
                ->get()
        );
    }
//    public function index(Request $request)   ЭТО БЕЗ ОТОБОРАЖЕНИЯ НАИМЕНОВАНИЙ КОМАНД, ТОЛЬКО ПО ID
//    {
//        return response(Player::limit($request->perpage ?? 5)
//            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
//            ->get());
//    }

    public function total()
    {
        return response(Player::all()->count());
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
