@extends('layout')
@section('content')
    <h2>Добавление тега</h2>
    <form method="post" action="{{url('user/store')}}">
        @csrf
        
        <label>Название</label>
        <input type="text" name="name" value="{{old('name')}} "/>
        @error('name')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <label>Пренадлежит тегу</label>
        <input type="text" name="id_parent" value="{{old('id_parent')}} "/>
        @error('id_parent')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <input class="btn btn-primary" type="submit" value="Добавить">
    </form>
@endsection
