@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj kategorię</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update',$category->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include ('admin.category.form')

        </form>
    </div>

@endsection
