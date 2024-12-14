<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Список игроков</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table border="1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Полное имя</th>
            <th>Роль</th>
            <th>ID команды</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player->id }}</td>
                <td>{{ $player->Full_name }}</td>
                <td>{{ $player->role }}</td>
                <td>{{ $player->team_id }}</td>
                <td>
                    <a href="{{ route('player_edit', $player->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('player_destroy', $player->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены, что хотите удалить этого игрока?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $players->links() }}

    <a href="{{ route('player_create') }}" class="btn btn-primary">Добавить нового игрока</a>
</div>
</body>
</html>
