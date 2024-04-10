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
    <h2>{{$post ? "Пост №".$post->id : "Неверный id поста"}}</h2>
    @if($post)
            <p>Пренадлежит пользователю: <a href="{{url('user/'.$post->user->id)}}">{{$post->user->name}}</a></p>
            <p>Содержание: {{$post->content}}</p>
            <p>Лайки: {{$post->like}}</p>
            <p>Дата создания: {{$post->created_at}}</p>

    <table border="1">
        Tags list:
        <thread>
            <td>id</td>
            <td>название тега</td>
        </thread>
        @foreach ($post->tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td><a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a></td>
            </tr>
        @endforeach
    </table>
    <p></p>
    <table border="1">
        Comments list: 
        <a href="{{url('post/'.$post->id.'/comments')}}">Подробнее {{count($post->comments)}} комментария</a>
        <thread>
            <td>id</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Дата создания</td>
            <td>Действие</td>
        </thread>
        @foreach ($post->comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
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
    @endif
</body>
</html>
