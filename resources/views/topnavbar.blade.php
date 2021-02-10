<nav class="navbar navbar-expand-md navbar-dark flex-md-nowrap bg-dark">
    <a class="navbar-brand col-sm-2 mr-0" href="{{ route('welcome') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('matches.index') }}">Mecze</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('results.index') }}">Wyniki</a>
            </li>
        </ul>
    </div>

    <ul class="navbar-nav list-group list-group-horizontal px-3">
        @auth
            <li class="nav-item text-nowrap list-inline-item pr-3">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Panel Administracyjny</a>
            </li>
            <li class="nav-item text-nowrap list-inline-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Wyloguj') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        @endauth
    </ul>
    <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Wyszukaj</button>
    </form>
</nav>


