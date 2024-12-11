<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
    <h2>{{ $team_show ? "Список игроков команды " .$team_show-> name : "Неверный ID команды" }}</h2>{{--переменные(2) из контроллера--}}
    @if($team_show)
        <table border="1">
            <thead>
            <td>id</td>
            <td>Полное имя</td>
            <td>амплуа</td>
            <td>ID команды</td>
            </thead>
            @foreach ($team_show->player as $player){{--player это функция в модели(отношение), элемент списка.....--}}
                <tr>
                    <td>{{$player->id}}</td>
                    <td>{{$player->Full_name}}</td>
                    <td>{{$player->role}}</td>
                    <td>{{$player->team_id}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>>

