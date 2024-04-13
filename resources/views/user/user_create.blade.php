@extends('layout')
@section('content')
    <h2>Добавление пользователя</h2>
    <form method="post" action="{{url('user/store')}}">
        @csrf
        
        <label>имя</label>
        <input type="text" name="name" value="{{old('name')}} "/>
        @error('name')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <label>email</label>
        <input type="text" name="email" value="{{old('email')}} "/>
        @error('email')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <label>password</label>
        <input type="text" name="password" value="{{old('password')}} "/>
        @error('password')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <input class="btn btn-primary" type="submit" value="Зарегистрироваться">
    </form>
@endsection
