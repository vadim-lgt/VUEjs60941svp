<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
<h2>{{$player_show ? "Футболист с ID:" .$player_show->id : "Неверный ID игрока"}}</h2>
@if($player_show)
    <table border="1">
        <tr>
            <td>ID</td>
            <td>{{$player_show->id}}</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td>{{$player_show->Full_name}}</td>
        </tr>
        <tr>
            <td>Номер</td>
            <td>{{$player_show->role}}</td>
        </tr>
        <tr>
            <td>Команда</td>
            <td>{{$player_show->team_id}}</td>
        </tr>
    </table>
@else
    <p>Игрок с таким ID не найден.</p>
@endif
</body>
</html>

