<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Редактировать игрока</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('player_update', $player->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Full_name">Полное имя</label>
            <input type="text" name="Full_name" id="Full_name" class="form-control" value="{{ old('Full_name', $player->Full_name) }}" required>
        </div>

        <div class="form-group">
            <label for="role">Роль</label>
            <input type="text" name="role" id="role" class="form-control" value="{{ old('role', $player->role) }}" required>
        </div>

        <div class="form-group">
            <label for="team_id">Команда</label>
            <select name="team_id" id="team_id" class="form-control" required>
                <option value="" disabled selected>Выберите команду</option>
                @foreach ($teams as $team)
                    <option value="{{ $team->id }}" {{ old('team_id', $player->team_id) == $team->id ? 'selected' : '' }}>
                        {{ $team->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
</body>
</html>
