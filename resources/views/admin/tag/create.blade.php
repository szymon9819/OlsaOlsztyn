@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nowy tag</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.tags.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.tag.form')

        </form>
    </div>

@endsection
