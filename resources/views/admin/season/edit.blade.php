@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj Sezon</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.seasons.update',$season->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include ('admin.season.form')

        </form>
    </div>

@endsection
