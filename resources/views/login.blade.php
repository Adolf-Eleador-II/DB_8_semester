@extends('layout')
@section('content')
@if($user)
    <h2>3дравствуйте, {{$user->name}}</h2>
@else
    <h2>Вход в систему</h2>
    <form method="post" action="{{url('auth')}}"/>
        @csrf
        
        <label>E-mail</label>
        <input type="text" name="email" value="{{old('email')}}"/>
        @error('email')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>
        
        <label>Пароль</label>
        <input type="password" name="password" value="{{old('password')}}"/>
        @error('password')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <input class="btn btn-primary" type="submit" value="Вход">
    </form>
    @error('error')
    <div style="color: red;">{{$message}}</div>
    @enderror
@endif
@endsection
