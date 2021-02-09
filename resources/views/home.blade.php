@extends('layouts.app')

@section('content')

    <div class="col-lg-8 col-md-5">
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

    <div class="col-lg-3  col-md-5">

        @foreach($scoreboards as $leaugeName =>$scoreboard)
            <div class="scoreboard ">
                <table class="table table-bordered table-striped text-white">
                    <thead>
                    <tr>
                        <th colspan="3">{{$leaugeName}}</th>
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



@endsection
