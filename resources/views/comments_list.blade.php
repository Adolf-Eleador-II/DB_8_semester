<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments on the posts </title>
</head>
<body>
    <h2>Список comments:</h2>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Пренадлежит посту</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Дата создания</td>
        </thread>
    @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td>{{$comment->id_post}}</td>
            <td>{{$comment->id_user}}</td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->date_create}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
