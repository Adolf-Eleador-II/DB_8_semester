<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <p>
        Список всех: 
        <a href="{{url('/users')}}">Пользователей</a>
        <a href="{{url('/posts')}}">Постов</a>
        <a href="{{url('/tags')}}">Тегов</a>
    </p>
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
                <td><a href="{{url('post/'.$post->id)}}">{{$post->content}}</a></td>
                <td>{{$post->like}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </table>
        <p></p>
        <table border="1">
            Список созданных комментариев:
            <thread>
                <td>id</td>
                <td>К посту</td>
                <td>Содержание</td>
                <td>Дата создания</td>
            </thread>
        @foreach ($user->comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td><a href="{{url('post/'.$comment->post->id)}}">{{$comment->post->id}}</a></td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->created_at}}</td>
            </tr>
        @endforeach
        </table>
    @endif
</body>
</html>
