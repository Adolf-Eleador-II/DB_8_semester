@extends('layout')
@section('content')
    <h2>Добавление комментария</h2>
    <form method="post" action="{{url('post/'.$id_post.'/comment/store')}}">
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