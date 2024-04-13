@extends('layout')
@section('content')
    <h2>Добавление поста</h2>
    <form method="post" action="{{url('post/store')}}">
        @csrf
        
        <label>Содержание</label>
        <input type="text" name="content" value="{{old('content')}}"/>
        @error('content')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>
        
        <input class="btn btn-primary" type="submit" value="Добавить">
    </form>
@endsection
