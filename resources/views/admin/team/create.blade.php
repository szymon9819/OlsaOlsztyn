@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nową drużyne</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.teams.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.team.form')

        </form>
    </div>

@endsection
