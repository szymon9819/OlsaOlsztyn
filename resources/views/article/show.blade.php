@extends('layouts.app')

@section('content')
    <div class="container text-white col-md-6">
            <h1 class="text-center">{{$post->title}}</h1>
            <div class="row ">
                {!! $post->content !!}
            </div>
    </div>
@endsection
