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

    <div id="imagesCarousel" class="carousel pt-3" data-ride="carousel">
        <div class="carousel-inner">
            <ol class="carousel-indicators">
                @foreach($post->images as $image)
                    <li data-target="#imagesCarousel" data-slide-to="{{$loop->index}}" class="active"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($post->images as $image)
                <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
                    <img class="d-block w-100" src="http://127.0.0.1:8000/{{$image->name}}" alt="First slide">
                </div>
                @endforeach
            </div>
        </div>
        <a class="carousel-control-prev" href="#imagesCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imagesCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

@endsection
