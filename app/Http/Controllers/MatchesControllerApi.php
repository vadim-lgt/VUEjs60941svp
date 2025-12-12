<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Exception;

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
                    'team2.name as team2_name',
                    'matches.picture_url'
                )
                ->orderBy('matches.id', 'asc')
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
        if (!Gate::allows('create-match')) {
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление матча',
            ]);
        }
        $request->headers->set('Accept', 'application/json');

        $validated = $request->validate([
            'com1_id' => 'required|exists:teams,id',
            'com2_id' => 'required|exists:teams,id',
            'image' => 'required|file'
        ]);

        if ($validated['com1_id'] == $validated['com2_id']) {
            return response()->json(['code' => 3, 'message' => 'Команды не могут совпадать'], 422);
        }
        if (Matches::where('com1_id', $validated['com1_id'])->where('com2_id', $validated['com2_id'])->exists()) {
            return response()->json(['code' => 4, 'message' => 'Матч уже существует'], 422);
        }

        $file = $request->file('image');
        $fileName = rand(1, 100000).'_'.$file->getClientOriginalName();

        try {
            $path = Storage::disk('s3')->putFileAs('match_pictures', $file, $fileName);
            $fileUrl = Storage::disk('s3')->url($path);
        } catch (Exception $e) {
            return response()->json(['code' => 2, 'message' => 'Ошибка загрузки файла в S3']);
        }

        $match = new Matches($validated);
        $match->picture_url = $fileUrl;
        $match->save();

        return response()->json(['code' => 0, 'message' => 'Матч успешно добавлен']);
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
