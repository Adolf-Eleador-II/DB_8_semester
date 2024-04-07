



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>{{$user ? "Пользователь ".$user->name : "Неверный id пользователя"}}</h2>
    @if($user)
        <p>id: {{$user->id}}</p>
        <p>имя: {{$user->name}}</p>
        <p>email: {{$user->email}}</p>
        
        <table border="1">
            Список созданных постов:
            <thread>
                <td>id</td>
                <td>Содержание</td>
                <td>Лайки</td>
                <td>Дата создания</td>
            </thread>
        @foreach ($user->posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->like}}</td>
                <td>{{$post->date_create}}</td>
            </tr>
        @endforeach
        </table>
        <p></p>
        <table border="1">
            Список созданных комментариев:
            <thread>
                <td>id</td>
                <td>Содержание</td>
                <td>Дата создания</td>
            </thread>
        @foreach ($user->comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->date_create}}</td>
            </tr>
        @endforeach
        </table>
    @endif
</body>
</html>














