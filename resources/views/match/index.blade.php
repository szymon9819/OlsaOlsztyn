@extends('layouts.app')

@section('content')
    <div class="match-table">
        @foreach ($matches as $date=>$matches)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                    <th>
                        {{$date}}
                    </th>
                    </thead>
                    <tbody>
                    @foreach ($matches as $match)
                        <tr class="d-flex">
                            <td class="col">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</td>
                            <td class="col-4">{{ date('H:i', strtotime($match->time))}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

@endsection
