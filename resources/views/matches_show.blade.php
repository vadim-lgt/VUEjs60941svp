<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
    <h2>{{ $matches_show ? "Игроки матча " .$matches_show-> id ." забивших гол "  : "Неверный ID команды" }}</h2>{{--переменные(2) из контроллера--}}
    @if($matches_show)
        <table border="1">
            <thead>
            <td>id</td>
            <td>Полное имя</td>
            <td>амплуа</td>
            <td>ID команды</td>
            <td>Время забитого гола</td>
            {{--<td>ID матча</td>--}}
            </thead>
            @foreach ($matches_show->players as $player){{--1 player это функция в модели(отношение), 2 элемент списка.....--}}
                <tr>
                    <td>{{$player->id}}</td>
                    <td>{{$player->Full_name}}</td>
                    <td>{{$player->role}}</td>
                    <td>{{$player->team_id}}</td>
                    <td>{{$player->pivot->start_game}}</td>
                    {{--<td>{{$player->pivot->matches_id}}</td>--}}
                </tr>
            @endforeach
            <table class="table">
                <thead>
                <tr>
                    <th>Команда</th>
                    <th>Количество голов</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($results as $result)
                    <tr>
                        <td>{{ $result->team_name }}</td> <!-- Имя команды -->
                        <td>{{ $result->count }}</td> <!-- Количество голов -->
                    </tr>
                @endforeach
                </tbody>
            </table>
    @endif
</body>
</html>>
