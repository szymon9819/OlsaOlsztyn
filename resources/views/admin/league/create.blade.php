@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nową ligę</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.leagues.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.league.form')

        </form>
    </div>

@endsection
