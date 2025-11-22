<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatchesControllerApi extends Controller
{
    public function index(Request $request)
    {
        return response(
            DB::table('matches')
                ->join('teams as team1', 'matches.com1_id', '=', 'team1.id')
                ->join('teams as team2', 'matches.com2_id', '=', 'team2.id')
                ->select(
                    'matches.id',
                    'team1.name as team1_name',
                    'team2.name as team2_name'
                )
                ->limit($request->perpage ?? 5)
                ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
                ->get()
        );
    }


//    public function index(Request $request) ЭТО БЕЗ ОТОБОРАЖЕНИЯ НАИМЕНОВАНИЙ КОМАНД, ТОЛЬКО ПО ID
//    {
//        return response(Matches::limit($request->perpage ?? 5)
//            ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
//            ->get());
//    }

    public function total()
    {
        return response(Matches::all()->count());
    }

    public function show(string $id)
    {
        $match = Matches::find($id); // ищем матч по id
        if (!$match) { // если матча с таким id нет
            return response()->json(['error' => 'Match not found'], 404); // возвращаем ошибку 404
        } // если матча с таким id нет
        return response()->json(Matches::find($id));
    }

    public function store(Request $request)
    {

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
