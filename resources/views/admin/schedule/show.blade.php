@extends('layouts.admin')

@section('content')

    <div class="card-header">Wygenerowany terminarz</div>
    <div class="card-body">

        @foreach ($matches as $index=>$queues)
            <div class="table-responsive col-md-8 col-12 m-3">
                <table class="table table-dark table-bordered text-white table-hover">
                    <thead>
                    <tr class="d-flex">
                       <th class="col-12 text-center">
                           <strong>Kolejka: {{$index}}</strong>
                       </th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($queues as $match)
                        <tr class="d-flex">
                            <tr class="d-flex">
                                <th class="col-6">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</th>
                                <th class="col-3">{{ date('Y-m-d', strtotime($match->match_day))}}</th>
                                <td class="col-3">{{ date('H:i', strtotime($match->time))}}</td>
                            </tr>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach

    </div>

@endsection
