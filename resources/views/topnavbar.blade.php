<nav class="navbar navbar-expand-md navbar-dark flex-md-nowrap bg-dark">
    <a class="navbar-brand col-sm-2 mr-0" href="{{ route('home') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="nav-link text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategorie
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($navbarCategories as $navbarCategory)
                            <a class="dropdown-item"
                               href="{{ route('category.index',$navbarCategory->id) }},">{{$navbarCategory->name}}</a>
                        @endforeach
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <div class="dropdown show">
                    <a class="nav-link text-white dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tagi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($navbarTags as $navbarTag)
                            <a class="dropdown-item"
                               href="{{ route('tag.index',$navbarTag->id) }}">{{$navbarTag->name}}</a>
                        @endforeach
                    </div>
                </div>
            </li>
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

    <form class="form-inline mt-2 mt-md-0" action="{{ route('search') }}" method="POST">
        @csrf
        <input class="form-control mr-sm-2" type="text" name="parameter" placeholder="Szukaj" aria-label="Szukaj">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
    </form>
</nav>


