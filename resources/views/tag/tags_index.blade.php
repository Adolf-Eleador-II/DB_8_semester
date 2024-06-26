@extends('layout')
@section('content')
    <h2>Список тегов:</h2>
    <table border="1" class="table table-striped">
        <thread>
            <td>id</td>
            <td>Наименование</td>
            <td>Пренадлежит тегу</td>
        </thread>
    @foreach ($tags as $tag)
        <tr>
            <td>{{$tag->id}}</td>
            <td><a href="{{url('tag/'.$tag->id)}}">{{$tag->name}}</a></td>
            <td>@if($tag->id_parent)<a href="{{url('tag/'.$tag->tag->id)}}">{{$tag->tag->name}}</a>@endif</td>
        </tr>
    @endforeach
    </table>
@endsection
