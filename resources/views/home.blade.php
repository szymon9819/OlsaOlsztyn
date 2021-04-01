@extends('layouts.app')

@section('content')

    <div class="col-xl-8 col-lg-7 col-md-12 mb-3">
        @if(!empty($parameter))
            <div>
                <h2>Wyniki wyszukiwania dla frazy: {{$parameter}}</h2>
            </div>
        @endif

        @if(empty($parameter) && empty($posts))
            <div>
                <h1>Brak postów zawierających</h1>
            </div>
        @endif

        {{$posts->links()}}

        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item rounded-0 list-article border-bottom">
                    <a href="{{route('article.show',$post->id)}}" style="text-decoration:none;">
                        <div class="d-inline-flex">
                            @if(!empty($post->thumbnail))
                                <div class="pr-3">
                                    <img height="50" src="{{asset($post->thumbnail)}}">
                                </div>
                            @endif
                            <div class="align-self-center">
                                <h3>
                                    {{$post->title}}
                                </h3>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-xl-4 col-lg-5 col-md-12 d-flex justify-content-center">
        @include('scoreboard')</div>
    </div>

@endsection
