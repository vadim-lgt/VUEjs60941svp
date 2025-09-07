<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;

class MatchesControllerApi extends Controller
{
    public function index()
    {
        return response()->json(Matches::all());
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
