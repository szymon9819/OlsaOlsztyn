@extends('layouts.app')

@section('content')
    <div class=".flex-column result-table">
        @foreach ($matches as $date=>$matches)
            <div class="table-responsive ">
                <table class="table border">
                    <thead class="thead-dark">
                    <th>
                        {{$date}}
                    </th>
                    </thead>
                    <tbody>
                    @foreach ($matches as $match)
                        <tr class="d-flex">
                            <td class="col">
                                <p class="text-left">
                                    {{$match->homeTeam->name}}
                                </p>
                            </td>
                            <td class="col">
                                <p class="text-center">
                                    <strong>{{$match->matchResult->home}}</strong>:
                                    <strong>{{$match->matchResult->guest}}</strong>
                                </p>
                            </td>
                            <td class="col">
                                <p class="text-right">
                                    {{$match->awayTeam->name}}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

@endsection
