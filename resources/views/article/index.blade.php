@extends('layouts.app')

@section('content')

    <ul class="list-group">
        @foreach($posts as $post)
            <li class="list-group-item">
                <div class="col-sm-6 col-md-3">
                    <a href="{{route('article.show',$post->id)}}">
                        <picture>
                            @if(!empty($post->thumbnail))
                                <img width="150" src="{{asset($post->thumbnail)}}" alt="miniaturka">
                            @endif
                        </picture>
                        <div>
                            <h3>
                                {{$post->title}}
                            </h3>
                        </div>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>

@endsection
