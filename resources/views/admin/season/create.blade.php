@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nowy sezon</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.seasons.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.season.form')

        </form>
    </div>

@endsection
