@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center">{{$post->title}}</h1>
        <div class="row">
            <div class="col-md-8">
                {!! $post->content !!}
            </div>
        </div>

    </div>
@endsection
