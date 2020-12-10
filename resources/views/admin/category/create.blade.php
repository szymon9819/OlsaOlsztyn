@extends('layouts.admin')

@section('content')

    <div class="card-header">Dodaj nową kategorię</div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.categories.store') }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            @csrf

            @include ('admin.category.form')

        </form>
    </div>

@endsection
