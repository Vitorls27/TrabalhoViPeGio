    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">Café|Vip</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" aria-current="page" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Cadastros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('/usuario') }}">Usuário</a></li>
                            <li><a class="dropdown-item" href="{{ url('/funcionario') }}">Funcionários</a></li>
                            <li><a class="dropdown-item" href="{{ url('/estoque') }}">Estoque</a></li>
                            <li><a class="dropdown-item" href="{{ url('/cardapio') }}">Cardápio</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/leitura') }}">Sensor</a>
                    </li>
                </ul>
            </div>
            <div style="margin-right: 50px;">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Logar') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                        </li>
                    @endif
                @else
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='fas fa-user'></i> {{ Auth::user()->name }}
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"> <i class='fas fa-user-cog'></i> Perfil</a>
                            <a class="dropdown-item" href="#"><i class='fas fa-cog'></i> Configurações</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class='fas fa-sign-out-alt'></i> {{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

