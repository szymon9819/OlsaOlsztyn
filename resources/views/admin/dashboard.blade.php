@extends('layouts.admin')

@section('content')

    <div class="card-header">{{ __('Dashboard') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('admin dashboard') }}

        <ul>
            @foreach ($schedule as $queue)
                <li>
                    <p>Kolejka: {{$loop->index +1}}</p>
                    <ul>
                        @foreach($queue as $match)
                            @if(empty($match[0]) || empty($match[1]))
                                    @continue
                               @endif
                            <li>
                                <p>{{$match[0]}}  vs {{$match[1]}}</p>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
