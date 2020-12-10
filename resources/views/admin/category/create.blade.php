@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nowy post</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.posts.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.post.form')

        </form>
    </div>

@endsection
