@extends('layouts.app')

@section('content')


        <div class="col-12 col-sm-10 col-md-8  ">
            <ul class="list-group col-12">
                @foreach($posts as $post)
                    <li class="list-group-item list-article">
                        <a href="{{route('article.show',$post->id)}}" style="text-decoration:none;">
                            <div class="row">
                                @if(!empty($post->thumbnail))
                                    <div class="pr-3">
                                        <img height="50" src="{{asset($post->thumbnail)}}">
                                    </div>
                                @endif
                                <div class="text-secondary align-self-center">
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

        <div class="col-md-4 col-lg-">
            @include('leagueTable')
                            @yield('table')
        </div>

@endsection
