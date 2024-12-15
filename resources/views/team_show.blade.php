@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">
            {{ $team_show ? "Список игроков команды " . $team_show->name : "Неверный ID команды" }}
        </h2>

        @if($team_show)
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="table-responsive shadow-sm bg-light p-3 rounded">
                        <table class="table align-middle">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">Полное имя</th>
                                <th scope="col">Амплуа</th>
                            </tr>
                            </thead>
                            <tbody class="table-light">
                            @foreach ($team_show->player as $player)
                                <tr>
                                    <td class="fw-semibold">{{ $player->Full_name }}</td>
                                    <td>{{ $player->role }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger text-center">
                Неверный ID команды.
            </div>
        @endif
    </div>
@endsection
