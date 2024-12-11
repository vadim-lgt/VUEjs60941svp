<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MatchesController extends Controller
{
    /**
     * Display the specified resource.
     */
    //Здесь реализована связь многие-ко-многим
    public function show(string $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        // Получаем идентификаторы команд из таблицы matches для указанного матча $id
        $match = DB::table('matches')
            ->select('com1_id', 'com2_id')
            ->where('id', '=', $id)
            ->first();

        if (!$match) {
            // Если матча с данным идентификатором не существует, вернуть ошибку 404
            abort(404);
        }

        // Получаем все команды, которые соответствуют com1_id и com2_id
        $teams = DB::table('teams')
            ->join('player', 'teams.id', '=', 'player.team_id')
            ->leftJoin('goal', 'player.id', '=', 'goal.player_id')
            ->where(function ($query) use ($match) {
                $query->where('teams.id', '=', $match->com1_id)
                    ->orWhere('teams.id', '=', $match->com2_id);
            })
            ->select('teams.id as team_id', 'teams.name as team_name')
            ->distinct()
            ->get();

        // Запрос для подсчета голов каждой команды в данном матче
        $results = DB::table('player')
            ->join('goal', 'player.id', '=', 'goal.player_id')
            ->where('goal.matches_id', '=', $id)
            ->select('player.team_id', DB::raw('COUNT(goal.id) as count'))
            ->groupBy('player.team_id')
            ->get();

        // Объединяем данные о командах и количестве голов
        $finalResults = $teams->map(function($team) use ($results) {
            $count = $results->firstWhere('team_id', $team->team_id);
            $team->count = $count ? $count->count : 0; // Устанавливаем count в 0, если нет голов
            return $team;
        });
        //Все, что выше это sql-запрос
        return view('matches_show', [
            'matches_show' => Matches::find($id),
            'results' => $finalResults
        ]);//1 представление(название); 2 переменная массива(массив переменных); 3 метод Matches
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
//sql запрос который не до конца выполняет требуемое
/*$results = DB::table('player')
    ->join('goal', 'player.id', '=', 'goal.player_id')
    ->where('goal.matches_id', '=', $id) // Изменяем условие на matches_id
    ->select('player.team_id', DB::raw('COUNT(*) as count'), 'goal.id')
    ->groupBy('player.team_id', 'goal.id')
    ->orderBy('goal.id')
    ->get();*/
