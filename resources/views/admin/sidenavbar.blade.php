<nav id="sidebar" class="pt-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item d-flex">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    Panel
                </a>
                <a class="nav-link text-right pr-5" onclick="collapseSidebar()">
                    <div class="col-10 col-md-6 col-sm-4">
                        X
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">
                    Posty
                </a>
                <ul class="dropdown-menu bg-dark">
                    <li><a class="dropdown-item" href="{{route('admin.posts.index')}}"> Posty</a></li>
                    <li><a class="dropdown-item" href="{{route('admin.categories.index')}}"> Kategorie </a></li>
                    <li><a class="dropdown-item" href="{{route('admin.tags.index')}}"> Tagi </a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.leagues.index')}}">
                    Ligi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.seasons.index')}}">
                    Sezony
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.teams.index')}}">
                    Drużyny
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.stadiums.index')}}">
                    Hale
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.matches.index')}}">
                    Mecze
                </a>
            </li>

        </ul>
    </div>
</nav>

