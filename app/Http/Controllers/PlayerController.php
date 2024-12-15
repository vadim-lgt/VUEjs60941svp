<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;
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
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 10;
        $players = Player::paginate($perpage)->withQueryString(); // Получаем 10 игроков на страницу
        return view('players_index', ['players' => $players]);
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


    //Здесь еще реализовано 5 задание(CRUD):
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application
    {
        $teams = Team::all(); // Получаем все команды
        return view('player_create', ['teams' => $teams]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Full_name' => 'required|string|max:255',
            'role' => 'required|string|max:100',
            'team_id' => 'required|integer',
        ]);

        // Create a new player using mass assignment
        Player::create($validatedData);

        return redirect()->route('players.index')->with('success', 'Игрок успешно добавлен');
    }

    public function edit(string $id)
    {
        if (!\Illuminate\Support\Facades\Auth::check()) {
            return redirect('/players')->withErrors(['error' => 'Вы не авторизованы для редактирования записи.']);
        }
        $player = Player::findOrFail($id);
        $teams = Team::all();
        return view('player_edit', ['player' => $player, 'teams' => $teams]);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'Full_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
        ]);

        $player = Player::findOrFail($id);
        $player->update($validatedData);

        return redirect()->route('players.index')->with('success', 'Игрок успешно обновлён');
    }

    public function destroy(string $id): \Illuminate\Http\RedirectResponse
    {
        if (!\Illuminate\Support\Facades\Gate::allows('destroy-player', Player::find($id))) {
            return redirect('/players')->withErrors(['error' => 'У вас нет прав администрирования!']);
        }
        $player = Player::findOrFail($id);
        $player->delete();

        Player::destroy($id);
        return redirect('/players')->withErrors(['success' => 'Запись удалена.']);
    }
}


