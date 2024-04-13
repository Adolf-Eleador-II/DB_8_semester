@extends('layout')
@section('content')
    <h2>Редактирование комментария</h2>
    <form method="post" action="{{url('post/'.$id_post.'/comment/update')}}">
        @csrf
        
        <label>Содержание</label>
        <input type="text" name="content" value="@if (old('content')) {{old('content')}} @else {{$comment->content}} @endif"/>
        @error('content')
        <div style="color: red;">{{$message}}</div>
        @enderror
        <p></p>

        <input class="btn btn-primary" type="submit" value="Изменить">
    </form>
@endsection
