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
                <tr>
                    <th>Mecz</th>
                    <th>Wynik meczu</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($matches as $match)
                    <tr>
                        <td class="col-md">{{$match->homeTeam->name}} vs {{$match->awayTeam->name}}</td>
                        <td class="col-md">{{ isset($match->matchResult) ? $match->matchResult->home.' : '.$match->matchResult->guest : ''}} </td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.matches.edit',$match->id) }}" class="btn btn-success btn"
                               title="edytuj mecz">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
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
