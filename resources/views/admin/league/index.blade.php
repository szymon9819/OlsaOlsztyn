@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Ligi</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.leagues.create') }}" class="btn btn-success btn mb-3" title="nowa liga">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj ligę
        </a>
        <div class="table-responsive">
            <table class="table text-white table-hover">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Hale</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($leagues as $league)
                    <tr>
                        <td class="col-md" >{{$league->name}}</td>
                        <td class="col-md" >
                            @foreach($league->stadiums as $std)
                                {{$std->adress}}
                            @endforeach
                        </td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.leagues.edit',$league->id) }}" class="btn btn-success btn "
                               title="nowa liga">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
                            <form method="POST" action="{{ route('admin.leagues.destroy', $league->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń ligę">
                                    Usuń
                                </button>
                            </form>
                    </tr>
                @endforeach
                    {{$leagues->links()}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
