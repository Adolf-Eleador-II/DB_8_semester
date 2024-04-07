



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>{{$post ? "Пост №".$post->id : "Неверный id поста"}}</h2>
    @if($post)
            <p>Пренадлежит пользователю: {{$post->user->name}}</p>
            <p>Содержание: {{$post->content}}</p>
            <p>Лайки: {{$post->like}}</p>
            <p>Дата создания: {{$post->date_create}}</p>

    <table border="1">
        Tags list:
        <thread>
            <td>id</td>
            <td>название тега</td>
        </thread>
        @foreach ($post->tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
            </tr>
        @endforeach
    </table>
    <p></p>
    <table border="1">
        Comments list:
        <thread>
            <td>id</td>
            <td>пренадлежит пользователю</td>
            <td>содержание</td>
            <td>date</td>
        </thread>
        @foreach ($post->comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->content}}</td>
                <td>{{$comment->date_create}}</td>
            </tr>
        @endforeach
    </table>
    @endif
</body>
</html>














