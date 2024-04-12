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
    <h2>Список users:</h2>
    <p></p>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Имя</td>
            <td>Почта</td>
            <td>Действие</td>
        </thread>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td><a href="{{url('user/'.$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{url('user/'.$user->id.'/edit')}}">Изменить</a>
                <a href="{{url('user/'.$user->id.'/destroy')}}">Удалить</a>
            </td>
        </tr>
    @endforeach
    </table>
</body>
</html>
