@extends('layouts.admin')

@section('content')

    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
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
            <ul id="schedule" class="list-group text-white">
                @foreach ($leagues as $league)
                    <li class="list-group-item border-0 bg-dark">
                        <strong>{{$league->name}}</strong>
                        <ul class="list-group  bg-dark">
                            @foreach($league->seasons as $season)
                                <li class="list-group-item border-0 bg-dark">
                                    <a href="" class="list-group-item list-group-item-action bg-dark">
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
