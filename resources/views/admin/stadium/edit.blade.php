@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj halę</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.stadiums.update',$stadium->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include ('admin.stadium.form')

        </form>
    </div>

@endsection
