<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Video Hvost</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          @guest
          <li class="nav-item">
            <a class="nav-link" href="/reg">Регистрация</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/auth">Авторизация</a>
          </li>
          @endguest
          @auth
          @if (Auth::user()->id_role == 1)
          <li class="nav-item">
            <a class="nav-link" href="/admin">Панель администратора</a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="/profile">Мои видеоролики</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Выход</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
</nav>
