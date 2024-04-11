<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
    {{-- @vite('resources/css/app.css') --}}
</head>
<body>
    <p>
        Список всех: 
        <a href="{{url('/users')}}">Пользователей</a>
        <a href="{{url('/posts')}}">Постов</a>
        <a href="{{url('/tags')}}">Тегов</a>
    </p>
    <h2>Список постов:</h2>
    <a href="{{url('post/create')}}">Создать пост</a>
    <p></p>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Комментарии</td>
            <td>Лайки</td>
            <td>Дата создания</td>
            <td>Действие</td>
        </thread>
    @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{url('user/'.$post->user->id)}}">{{$post->user->name}}</a></td>
            <td><a href="{{url('post/'.$post->id)}}">{{$post->content}}</a></td>
            <td><a href="{{url('post/'.$post->id.'/comments')}}">Всего {{count($post->comments)}}</a></td>
            <td>{{$post->like}}</td>
            <td>{{$post->created_at}}</td>
            <td>
                <a href="{{url('post/'.$post->id.'/edit')}}">Изменить</a>
                <a href="{{url('post/'.$post->id.'/destroy')}}">Удалить</a>
            </td>
        </tr>
    @endforeach
    </table>
    <p>{{$posts->links()}}</p>
</body>
</html>
