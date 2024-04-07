<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>Список users:</h2>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Имя</td>
            <td>Почта</td>
        </thread>
    @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
