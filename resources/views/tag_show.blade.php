



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>{{$tag ? "Тег ".$tag->name : "Неверный id тега"}}</h2>
    @if($tag)
        <p>id: {{$tag->id}}</p>
        <p>Название: {{$tag->name}}</p>
        
        <table border="1">
            Список созданных постов с данным тегом:
            <thread>
                <td>id</td>
                <td>Содержание</td>
                <td>Лайки</td>
                <td>Дата создания</td>
            </thread>
        @foreach ($tag->posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->content}}</td>
                <td>{{$post->like}}</td>
                <td>{{$post->date_create}}</td>
            </tr>
        @endforeach
        </table>
    @endif
</body>
</html>














