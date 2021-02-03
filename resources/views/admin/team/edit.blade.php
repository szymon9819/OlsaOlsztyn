@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj drużynę</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.teams.update',$team->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            @include ('admin.team.form')

        </form>
    </div>

@endsection
