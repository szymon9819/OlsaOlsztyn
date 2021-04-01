@extends('layouts.app')

@section('content')

    <div class="container d-flex flex-column">
        <h2>{{$category->name}}</h2>
        <div class="row">

            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img class="card-img-top" style="height: 225px; width: 100%; display: block;"
                             src="{{!empty($post->thumbnail)? asset($post->thumbnail): asset("images/not-found.png")}}"
                             data-holder-rendered="true">
                        <div class="card-body">
                            <p class="card-text">{{ $post->title}}</p>
                            <small class="text-muted">{{$post->updated_at}}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
