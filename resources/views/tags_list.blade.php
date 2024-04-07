<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>Список tags:</h2>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Наименование</td>
            <td>Пренадлежит тегу</td>
        </thread>
    @foreach ($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td>{{$tag->name}}</td>
            <td>{{$tag->id_parent}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
