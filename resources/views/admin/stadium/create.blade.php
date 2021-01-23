@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nową halę</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.stadiums.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.stadium.form')

        </form>
    </div>

@endsection
