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
            <div class="col-12 col-md-6">
                @if(empty($matches))
                    <label for="schedule"><strong>Brak wyników do wprowadzenia</strong></label>
                @else
                    <label for="schedule"><strong>Wprowadz wyniki ostatnio rozegranych meczy</strong></label>
                @endif
                <ul id="schedule" class="list-group text-white">
                    @foreach ($matches as $league=>$leagueMatches)
                        <li class="list-group-item border-0 bg-dark" style="width: 300px!important;">
                            @if(!empty($leagueMatches))
                                <strong>{{$league}}</strong>
                                <ul class="list-group bg-dark">
                                    @foreach($leagueMatches as $match)
                                        <li class="list-group-item border-0 bg-dark">
                                            <a href="{{ route('admin.matches.edit',$match->id) }}"
                                               class="list-group-item list-group-item-action text-white matches-list-dark">
                                                {{$match->home_name}} vs {{ $match->guest_name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-12 col-lg-5 col-md-6 d-flex justify-content-center">
                @include('scoreboard')
            </div>

        </div>

    </div>
@endsection
