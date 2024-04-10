<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
    <style> .is-invalid { color: red; } </style>
</head>
<body>
    <h2>Редактирование поста</h2>
    <form method="post" action="{{url('post/'.$post->id.'/update')}}">
        @csrf
        
        <label>Содержание</label>
        <input type="text" name="content" value="@if (old('content')) {{ old('content')}} @else {{$post->content}} @endif"/>
        @error('content')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <input type="submit"/>
    </form>
</body>
</html>
