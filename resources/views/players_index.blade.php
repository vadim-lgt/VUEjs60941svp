@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">Список игроков</h1>

        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="bg-primary text-white">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Полное имя</th>
                    <th scope="col">Роль</th>
                    <th scope="col">Команда</th>
                    <th scope="col" class="text-center">Действия</th>
                </tr>
                </thead>
                <tbody class="table-light">
                @forelse ($players as $player)
                    <tr>
                        <td class="fw-bold">{{ $player->id }}</td>
                        <td>{{ $player->Full_name }}</td>
                        <td>{{ $player->role }}</td>
                        <td>{{ $player->team_id }}</td>
                        <td class="text-center">
                            <a href="{{ route('player_edit', $player->id) }}" class="btn btn-sm btn-outline-primary">
                                Редактировать
                            </a>
                            <form action="{{ route('player_destroy', $player->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Вы уверены, что хотите удалить этого игрока?')">
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-secondary">Нет данных о игроках</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <form method="GET" action="{{ route('players.index') }}" class="d-flex align-items-center">
                <label for="perpage" class="me-2 text-primary">Строк на странице:</label>
                <select name="perpage" id="perpage" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="10" {{ request('perpage') == 10 ? 'selected' : '' }}>10</option>
                    <option value="20" {{ request('perpage') == 20 ? 'selected' : '' }}>20</option>
                    <option value="30" {{ request('perpage') == 30 ? 'selected' : '' }}>30</option>
                </select>
                @foreach(request()->except('perpage','page') as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
            </form>
            <div>
                {{ $players->links() }}
            </div>
        </div>
    </div>
@endsection
