<! doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
@if($user)
    <h2>3дравствуйте, {{ $user->name }}</h2>
    <a href="{{url('logout')}}">Выйти из системы</a>
@else
    <h2>Вход в систему</h2>
    <form method="post" action="{{url('auth')}}"/>
        @csrf
        
        <label>E-mail</label>
        <input type="text" name="email" value="{{ old('email')}}"/>
        @error('email')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>
        
        <label>Пароль</label>
        <input type="password" name="password" value="{{ old('password')}}"/>
        @error('password')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <input type="submit">
    </form>
    @error('error')
    <div class="is-invalid">{{ $message }}</div>
    @enderror
    <p></p>
    <a href="{{url('user/create')}}">Создать пользователя</a>
@endif
</body>
</html>
