<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Редактирование пользователя</h2>
    <form method="post" action="{{url('user/'.$user->id.'/update')}}">
        @csrf
        
        <label>имя</label>
        <input type="text" name="name" value="@if (old('name')) {{ old('name')}} @else {{$user->name}} @endif"/>
        @error('name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <label>email</label>
        <input type="text" name="email" value="@if (old('email')) {{ old('email')}} @else {{$user->email}} @endif"/>
        @error('email')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <label>password</label>
        <input type="text" name="password" value="@if (old('password')) {{ old('password')}} @else {{$user->password}} @endif"/>
        @error('password')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <input type="submit"/>
    </form>
</body>
</html>
