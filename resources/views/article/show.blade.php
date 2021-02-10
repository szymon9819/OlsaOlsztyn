@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white pt-5">
        <div class="container col-md-6">
            <h1 class="text-center">{{$post->title}}</h1>
            <div style="height:50px;"></div>
            <div class="row">
                {!! $post->content !!}
            </div>
        </div>
    </div>

@endsection
