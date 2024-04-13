@extends('layout')
@section('content')
    <h2>Редактирование пользователя</h2>
    <form method="post" action="{{url('user/'.$user->id.'/update')}}">
        @csrf
        
        <label>имя</label>
        <input type="text" name="name" value="@if (old('name')) {{old('name')}} @else {{$user->name}} @endif"/>
        @error('name')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <label>email</label>
        <input type="text" name="email" value="@if (old('email')) {{old('email')}} @else {{$user->email}} @endif"/>
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

        <input class="btn btn-primary" type="submit" value="Изменить">
    </form>
@endsection
