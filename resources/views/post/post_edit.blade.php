@extends('layout')
@section('content')
    <h2>Редактирование поста</h2>
    <form method="post" action="{{url('post/'.$post->id.'/update')}}">
        @csrf
        
        <label>Содержание</label>
        <input type="text" name="content" value="@if (old('content')) {{old('content')}} @else {{$post->content}} @endif"/>
        @error('content')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <input class="btn btn-primary" type="submit" value="Изменить">
    </form>
@endsection
