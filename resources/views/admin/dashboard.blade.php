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

        <div class="col-12 col-md-8 col-lg-6">
            <label for="schedule">Wprowadz wyniki ostatnio rozegranych meczy</label>
            <ul id="schedule" class="list-group text-white">
                @foreach ($matches as $leagueMatch)
                    <li class="list-group-item border-0 bg-dark">
                        <strong>{{$leagueMatch['league']->name}}</strong>
                        <ul class="list-group  bg-dark">
                            @foreach($leagueMatch['matches'] as $match)
                                <li class="list-group-item border-0 bg-dark ">
                                    <a  href="{{ route('admin.matches.edit',$match['match_id']) }}"
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

        <div class="col-12 col-md-8 col-lg-6">
            <ul id="schedule" class="list-group text-white">
                @foreach ($leagues as $league)
                    <li class="list-group-item border-0 bg-dark">
                        <strong>{{$league->name}}</strong>
                        <ul class="list-group  bg-dark">
                            @foreach($league->seasons as $season)
                                <li class="list-group-item border-0 bg-dark ">
                                    <a href="" class="list-group-item list-group-item-action bg-dark text-white">
                                        {{$season->season}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
@endsection
