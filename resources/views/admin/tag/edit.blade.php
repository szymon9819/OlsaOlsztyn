@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj tag</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.tags.update',$tag->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            @method('PATCH')
            @csrf

            @include ('admin.tag.form')

        </form>
    </div>

@endsection
