<nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">REA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" style="justify-content: space-between" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/posts')}}">Посты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/users')}}">Пользователи</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/tags')}}">Теги</a>
        </li>
      </ul>

      <ul class="navbar-nav">
      <?php [$session_user = Auth::user()] ?>
      @isset($session_user)
        <li class="nav-item">
          <a class="nav-link" href="{{url('/user/'.$session_user->id)}}">Пользователь {{$session_user->name}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">Выход</a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{url('/login')}}">Вход</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/user/create')}}">Регистрация</a>
        </li>
      @endisset
      </ul>
    </div>
  </div>
</nav>
