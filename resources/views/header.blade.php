<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Логотип -->

            <a class="navbar-brand" href="{{ url('/') }}">Football</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Меню -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown">
                            Меню
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('players') }}">Игроки</a></li>
                            <li><a class="dropdown-item" href="{{ url('players/create') }}">Добавить игрока</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/team_index') }}">Команды</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/matches_index') }}">Матчи</a>
                    </li>
                </ul>

                <!-- Форма входа -->
                @if(!Auth::user())
                    <form class="d-flex" method="post" action="{{ url('auth') }}">
                        @csrf
                        <input class="form-control me-2" type="text" placeholder="Логин" name="email" aria-label="Логин"
                               value="{{ old('email') }}" />
                        <input class="form-control me-2" type="password" placeholder="Пароль" name="password" aria-label="Пароль"
                               value="{{ old('password') }}" />
                        <button class="btn btn-outline-light" type="submit">Войти</button>
                    </form>
                @else
                    <ul class="navbar-nav">
                        <a class="nav-link active">
                            <i class="fa fa-user" style="font-size:20px; color: white;"></i>
                            <span></span>{{ Auth::user()->name }}
                        </a>
                        <a class="btn btn-outline-light my-2 my-sm-0" href="{{ url('logout') }}">Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
