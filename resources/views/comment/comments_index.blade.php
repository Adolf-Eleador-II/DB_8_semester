<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments on the posts </title>
</head>
<body>
    <p>
        Список всех: 
        <a href="{{url('/users')}}">Пользователей</a>
        <a href="{{url('/posts')}}">Постов</a>
        <a href="{{url('/tags')}}">Тегов</a>
    </p>
    <h2>Список comments:</h2>
    <a href="{{url('post/'.$id_post.'/comments')}}">Всего {{count($comments)}} комментария</a>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Пренадлежит посту</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Дата создания</td>
            <td>Действие</td>
        </thread>
    @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td><a href="{{url('post/'.$comment->id_post)}}">{{$comment->id_post}}</a></td>
            <td><a href="{{url('user/'.$comment->user->id)}}">{{$comment->user->name}}</a></td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->created_at}}</td>
            <td>
                {{-- <a href="{{url('post/'.$comment->id_post.'/comment/'.$comment->id.'/edit')}}">Изменить</a> --}}
                <a href="{{url('post/'.$comment->id_post.'/comment/'.$comment->id.'/destroy')}}">Удалить</a>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>
