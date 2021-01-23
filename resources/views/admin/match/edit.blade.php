@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj mecz</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.matches.update',$match->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include ('admin.match.form')

        </form>
    </div>

@endsection
