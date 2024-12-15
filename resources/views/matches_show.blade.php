@extends('layout')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4 text-primary">
            @if($matches_show && count($results) == 2)
                @php
                    $team1 = $results[0];
                    $team2 = $results[1];
                @endphp
                Статистика голов матча: {{ $team1->team_name }} : {{ $team2->team_name }}
            @else
                Неверный ID матча
            @endif
        </h2>
        @if($matches_show)
            <div class="table-responsive shadow-sm bg-light p-3 rounded mb-4">
                <table class="table align-middle text-center">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Полное имя</th>
                        <th scope="col">Амплуа</th>
                        <th scope="col">ID команды</th>
                        <th scope="col">Время забитого гола</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                    @foreach ($matches_show->players as $player)
                        <tr>
                            <td class="align-middle">{{$player->id}}</td>
                            <td class="align-middle">{{$player->Full_name}}</td>
                            <td class="align-middle">{{$player->role}}</td>
                            <td class="align-middle">{{$player->team_id}}</td>
                            <td class="align-middle">{{$player->pivot->start_game}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            @if (count($results) == 2)
                @php
                    $team1 = $results[0];
                    $team2 = $results[1];
                @endphp
                <div class="text-center bg-light p-3 rounded">
                    <p class="lead">
                        Матч
                        <span class="fw-bold">{{ $team1->team_name }}</span>
                        —
                        <span class="fw-bold">{{ $team2->team_name }}</span>
                        окончен с результатом:
                    </p>

                    <p class="h4">
                        <span class="fw-bold">{{ $team1->team_name }}</span>
                        <span class="mx-2">{{ $team1->count }} : {{ $team2->count }}</span>
                        <span class="fw-bold">{{ $team2->team_name }}</span>
                    </p>
                </div>
            @endif
        @endif
    </div>
@endsection
