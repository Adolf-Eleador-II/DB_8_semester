<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>Список постов:</h2>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Лайки</td>
            <td>Дата создания</td>
        </thread>
    @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->id_user}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->like}}</td>
            <td>{{$post->date_create}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
