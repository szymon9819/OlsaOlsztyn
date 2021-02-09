@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('admin.schedule.create') }}" class="mb-3 btn btn-success"
           title="Wygenruj trminarz">
            Wygeneruj treminarz
        </a>

        <div class="row">
            <div class="col-6 col-md-6">
                <label for="schedule">Wprowadz wyniki ostatnio rozegranych meczy</label>
                <ul id="schedule" class="list-group text-white">
                    @foreach ($matches as $leagueMatch)
                        <li class="list-group-item border-0 bg-dark">
                            <strong>{{$leagueMatch['league']->name}}</strong>
                            <ul class="list-group  bg-dark">
                                @foreach($leagueMatch['matches'] as $match)
                                    <li class="list-group-item border-0 bg-dark ">
                                        <a href="{{ route('admin.matches.edit',$match['match_id']) }}"
                                           class="list-group-item list-group-item-action bg-dark text-white">
                                            {{$match['home']->name}} vs {{ $match['guest']->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-5">

                <div id="myCarousel" class="carousel"data-interval="false">
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


{{--            <div class="col-12 col-md-8 col-lg-6">--}}
{{--            <ul id="schedule" class="list-group text-white">--}}
{{--                @foreach ($leagues as $league)--}}
{{--                    <li class="list-group-item border-0 bg-dark">--}}
{{--                        <strong>{{$league->name}}</strong>--}}
{{--                        <ul class="list-group  bg-dark">--}}
{{--                            @foreach($league->seasons as $season)--}}
{{--                                <li class="list-group-item border-0 bg-dark ">--}}
{{--                                    <a href="" class="list-group-item list-group-item-action bg-dark text-white">--}}
{{--                                        {{$season->season}}--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
            </ul>
        </div>

    </div>
@endsection
