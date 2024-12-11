<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
    <h2>Список футболистов:</h2>
    <table border="1">
        <thead>
        <td>id</td>
        <td>Полное имя</td>
        <td>Амплуа</td>
        <td>ID_команды</td>
        </thead>
        @foreach ($player_index as $player_index)
            <tr>
                <td>{{$player_index->id}}</td>
                <td>{{$player_index->Full_name}}</td>
                <td>{{$player_index->role}}</td>
                <td>{{$player_index->team_id}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
