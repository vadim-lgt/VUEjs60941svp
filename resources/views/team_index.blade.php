<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>60941</title>
</head>
<body>
<h2>Список команд:</h2>
<table border="1">
    <thead>
    <td>id</td>
    <td>Наименование</td>
    </thead>
    @foreach ($team_index as $team_index)
        <tr>
            <td>{{$team_index->id}}</td>
            <td>{{$team_index->name}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>>

