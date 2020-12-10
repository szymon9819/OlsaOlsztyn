@extends('layouts.admin')

@section('content')

    <div class="card-header"> Edytuj post</div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.posts.update',$post->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf

            @include ('admin.post.form')

        </form>
    </div>

@endsection
