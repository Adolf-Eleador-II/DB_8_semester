<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Добавление пользователя</h2>
    <form method="post" action="{{url('user/store')}}">
        @csrf
        
        <label>имя</label>
        <input type="text" name="name" value="{{ old('name')}} "/>
        @error('name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <label>email</label>
        <input type="text" name="email" value="{{ old('email')}} "/>
        @error('email')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <label>password</label>
        <input type="text" name="password" value="{{ old('password')}} "/>
        @error('password')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <input type="submit"/>
    </form>
</body>
</html>
