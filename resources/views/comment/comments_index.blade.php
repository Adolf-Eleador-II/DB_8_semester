@extends('layout')
@section('content')

    <h2>Список комментариев:</h2>
    <a href="{{url('post/'.$id_post.'/comments')}}">Всего {{count($comments)}} комментария</a>
    <table border="1" class="table table-striped">
        <thread>
            <td>id</td>
            <td>Пренадлежит посту</td>
            <td>Пренадлежит пользователю</td>
            <td>Содержание</td>
            <td>Дата создания</td>
            <td>Действие</td>
        </thread>
    @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->id}}</td>
            <td><a href="{{url('post/'.$comment->id_post)}}">{{$comment->id_post}}</a></td>
            <td><a href="{{url('user/'.$comment->user->id)}}">{{$comment->user->name}}</a></td>
            <td>{{$comment->content}}</td>
            <td>{{$comment->created_at}}</td>
            <td>
                {{-- <a href="{{url('post/'.$comment->id_post.'/comment/'.$comment->id.'/edit')}}">Изменить</a> --}}
                <a class="btn btn-outline-danger" href="{{url('post/'.$comment->id_post.'/comment/'.$comment->id.'/destroy')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>
            </td>
        </tr>
    @endforeach
    </table>
@endsection
