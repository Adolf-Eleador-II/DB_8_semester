@extends('layout')
@section('content')
    <h2>{{$tag ? "Тег ".$tag->name : "Неверный id тега"}}</h2>
    @if($tag)
        <p>id: {{$tag->id}}</p>
        <p>Название: {{$tag->name}}</p>
        @if($tag->id_parent)<p>Пренадлежит тегу: <a href="{{url('tag/'.$tag->tag->id)}}">{{$tag->tag->name}}</a></p>@endif
        
        <table border="1" class="table table-striped">
            Список созданных постов с данным тегом:
            <thread>
                <td>id</td>
                <td>Пренадлежит пользователю</td>
                <td>Содержание</td>
                <td>Лайки</td>
                <td>Дата создания</td>
            </thread>
        @foreach ($tag->posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{url('user/'.$post->user->id)}}">{{$post->user->name}}</a></td>
                <td><a href="{{url('post/'.$post->id)}}">{{$post->content}}</a></td>
                <td>{{$post->like}}</td>
                <td>{{$post->created_at}}</td>
            </tr>
        @endforeach
        </table>
    @endif
@endsection
