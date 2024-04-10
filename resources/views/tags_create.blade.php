<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CH_AS 609-01</title>
</head>
<body>
    <h2>Добавление тега</h2>
    <form method="post" action="{{url('user/store')}}">
        @csrf
        
        <label>Название</label>
        <input type="text" name="name" value="{{ old('name')}} "/>
        @error('name')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <label>Пренадлежит тегу</label>
        <input type="text" name="id_parent" value="{{ old('id_parent')}} "/>
        @error('id_parent')
        <div class="is-invalid">{{ $message }}</div>
        @enderror
        <p></p>

        <input type="submit"/>
    </form>
</body>
</html>
