@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nowy terminarz</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.schedule.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.schedule.form')

        </form>
    </div>

@endsection
