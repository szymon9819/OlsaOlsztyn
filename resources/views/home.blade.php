@extends('layouts.app')

@section('content')

    <div class="col-xl-8 col-lg-7 col-md-5">
        <ul class="list-group col-12">
            @foreach($posts as $post)
                <li class="list-group-item rounded-0 list-article border-bottom">
                    <a href="{{route('article.show',$post->id)}}" style="text-decoration:none;">
                        <div class="row">
                            @if(!empty($post->thumbnail))
                                <div class="pr-3">
                                    <img height="50" src="{{asset($post->thumbnail)}}">
                                </div>
                            @endif
                            <div class="align-self-center">
                                <h3>
                                    {{Str::limit($post->title, 60, ' (...) ')}}
                                </h3>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="col-xl-3 col-lg-4 col-md-5">

        <div id="myCarousel" class="carousel" data-interval="false">
            <div class="carousel-inner">
                @foreach($scoreboards as $leaugeName =>$scoreboard)
                    <div class="carousel-item {{$loop->index == 0 ? 'active':''}}">
                        <div class="scoreboard ">
                            <table class="table table-bordered table-striped text-white">
                                <thead>
                                <tr>
                                    <th colspan="3">
                                        <a href="#myCarousel" data-slide="prev">
                                            <span><</span></a>
                                        {{$leaugeName}}
                                        <a href="#myCarousel" data-slide="next">
                                            <span> > </span>
                                        </a>
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
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
