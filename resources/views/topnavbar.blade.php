
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ route('welcome') }}">
        {{ config('app.name', 'Laravel') }}
    </a>

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
</nav>
