@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nowy mecz</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.matches.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.matches.form')

        </form>
    </div>

@endsection
