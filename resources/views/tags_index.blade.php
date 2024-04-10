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
            <td><a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a></td>
            <td>@if($tag->id_parent)<a href="{{url('tag/'.$tag->tag->id)}}">{{$tag->tag->name}}</a>@endif</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
