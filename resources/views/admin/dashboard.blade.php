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
                @if($matches->isEmpty())
                    <label for="schedule"><strong>Brak wyników do wprowadzenia</strong></label>
                @else
                    <label for="schedule"><strong>Wprowadz wyniki ostatnio rozegranych meczy</strong></label>
                @endif
                <ul id="schedule" class="list-group text-white">
                    @foreach ($matches as $leagueMatch)
                        <li class="list-group-item border-0 bg-dark" style="width: 300px!important;">
                            <strong>{{$leagueMatch['league']->name}}</strong>
                            <ul class="list-group bg-dark">
                                @foreach($leagueMatch['matches'] as $match)
                                    <li class="list-group-item border-0 bg-dark">
                                        <a href="{{ route('admin.matches.edit',$match['match_id']) }}"
                                           class="list-group-item list-group-item-action text-white matches-list-dark">
                                            {{$match['home']->name}} vs {{ $match['guest']->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
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
