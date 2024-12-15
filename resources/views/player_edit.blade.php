@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="text-center mb-4 text-primary">Редактирование игрока</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('player_update', $player->id) }}" class="p-4 shadow-sm bg-light rounded">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="Full_name" class="form-label text-primary">Полное имя</label>
                        <input
                            type="text"
                            class="form-control @error('Full_name') is-invalid @enderror"
                            id="Full_name"
                            name="Full_name"
                            value="{{ old('Full_name', $player->Full_name) }}"
                            required>
                        @error('Full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label text-primary">Роль</label>
                        <input
                            type="text"
                            class="form-control @error('role') is-invalid @enderror"
                            id="role"
                            name="role"
                            value="{{ old('role', $player->role) }}"
                            required>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="team_id" class="form-label text-primary">Команда</label>
                        <select
                            class="form-select @error('team_id') is-invalid @enderror"
                            id="team_id"
                            name="team_id"
                            required>
                            <option style="display:none" disabled>Выберите команду</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}"
                                    {{ old('team_id', $player->team_id) == $team->id ? 'selected' : '' }}>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
@endsection
