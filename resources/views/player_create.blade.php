@extends('layout')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <h2 class="text-center mb-4 text-primary">Создать нового игрока</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('player_store') }}" method="POST" class="p-4 shadow-sm bg-light rounded">
                    @csrf
                    <div class="mb-3">
                        <label for="Full_name" class="form-label text-primary">Полное имя</label>
                        <input type="text"
                               class="form-control @error('Full_name') is-invalid @enderror"
                               id="Full_name"
                               name="Full_name"
                               value="{{ old('Full_name') }}"
                               required>
                        @error('Full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label text-primary">Роль</label>
                        <input type="text"
                               class="form-control @error('role') is-invalid @enderror"
                               id="role"
                               name="role"
                               value="{{ old('role') }}"
                               required>
                        @error('role')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="team_id" class="form-label text-primary">Команда</label>
                        <select class="form-select @error('team_id') is-invalid @enderror"
                                name="team_id"
                                id="team_id"
                                required>
                            <option style="display:none" disabled selected>Выберите команду</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}"
                                        @if(old('team_id') == $team->id) selected @endif>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('team_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Создать игрока</button>
                </form>
            </div>
        </div>
    </div>
@endsection
