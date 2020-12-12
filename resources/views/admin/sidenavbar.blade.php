<nav class="col-md-2 d-none d-md-block sidebar pt-3">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    Panel
                </a>
            </li>
            <li class="nav-item dropdown ">
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
                <a class="nav-link" href="#">
                    Mecze
                </a>
            </li>
        </ul>
    </div>
</nav>

@push('css')
    <link href="{{ asset('css/adminSidebar.css') }}" rel="stylesheet">
@endpush
