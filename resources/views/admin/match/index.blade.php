@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Mecze</strong></h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table text-white table-hover">
                <thead>
                <tr class="d-flex">
                    <th class="col">Mecz</th>
                    <th class="col">Data</th>
                    <th class="col-2">Wynik meczu</th>
                    <th class="col-1"></th>
                    <th class="col-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matches as $match)
                    <tr class="d-flex">
                        <td class="col">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</td>
                        <td class="col">{{$match->match_day}}</td>
                        <td class="col-2">{{ isset($match->matchResult) ? $match->matchResult->home.' : '.$match->matchResult->guest : ''}} </td>

                        <td class="col-1">
                            <a href="{{ route('admin.matches.edit',$match->id) }}" class="btn btn-success btn"
                               title="edytuj mecz">
                                Edytuj
                            </a></td>
                        <td class="col-1">
                            <form method="POST" action="{{ route('admin.matches.destroy', $match->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń mecz">
                                    Usuń
                                </button>
                            </form>
                    </tr>
                @endforeach
                {{ $matches->links() }}
                </tbody>
            </table>
        </div>
    </div>
@endsection
