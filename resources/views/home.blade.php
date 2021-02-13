@extends('layouts.app')

@section('content')

    <div class="col-xl-8 col-lg-6 col-md-12 mb-3">
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

    <div class="col-xl-4 col-lg-6 col-md-12 d-flex justify-content-center">
        <div id="myCarousel" class="carousel" data-interval="false">
            <div class="carousel-inner scoreboard">
                @foreach($scoreboards as $leaugeName =>$scoreboard)
                    <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                <tr>
                                    <th colspan="3">
                                        <div class="d-flex justify-content-between">
                                            <a href="#myCarousel" data-slide="prev">
                                            <span style="color:#fff;">
                                               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    fill="currentColor" class="bi bi-arrow-bar-left"
                                                    viewBox="0 0 18 18">
                                                    <path fill-rule="evenodd"
                                                          d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5zM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5z"/>
                                            </svg>
                                            </span>
                                            </a>
                                            {{$leaugeName}}
                                            <a href="#myCarousel" data-slide="next">
                                            <span style="color:#fff;"> <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="18" height="18"
                                                                            fill="currentColor"
                                                                            class="bi bi-arrow-bar-right"
                                                                            viewBox="0 0 18 18"><path
                                                        fill-rule="evenodd"
                                                        d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5z"/>
                                            </svg> </span>
                                            </a>
                                        </div>
                                    </th>
                                    <th>M</th>
                                    <th>W</th>
                                    <th>S</th>
                                    <th>P</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($scoreboard as $team => $data)
                                    <tr>
                                        <th class="scoreboard-small-cell">{{$loop->index+1}}</th>
                                        <th colspan="2">{{$team}}</th>
                                        <th class="scoreboard-small-cell">{{$data['matches']}}</th>
                                        <th class="scoreboard-small-cell">{{$data['wins']}}</th>
                                        <th class="scoreboard-medium-cell">{{$data['sw']}}:{{$data['sl']}}</th>
                                        <th class="scoreboard-small-cell">{{$data['pts']}}</th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
