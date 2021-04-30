@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Drużyny</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.teams.create') }}" class="btn btn-success btn mb-3" title="nowa drużyna">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj nową drużynę
        </a>
        <div class="table-responsive">
            <table class="table table-sm text-white table-hover">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Skrót</th>
                    <th>Liga</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($teams as $team)
                    <tr>
                        <td class="col-md" >{{$team->name}}</td>
                        <td class="col-md" >{{$team->shorthand}}</td>
                        <td class="col-md" >{{!empty($team->league['name'])?$team->league['name']:''}}</td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.teams.edit',$team->id) }}" class="btn btn-success btn "
                               title="nowa drużyna">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
                            <form method="POST" action="{{ route('admin.teams.destroy', $team->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń post">
                                    Usuń
                                </button>
                            </form>
                    </tr>
                @endforeach
                {{$teams->links()}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
