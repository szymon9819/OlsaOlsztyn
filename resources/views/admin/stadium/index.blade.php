@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Hale</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.stadiums.create') }}" class="btn btn-success btn mb-3" title="nowa hala">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj halę
        </a>
        <div class="table-responsive">
            <table class="table text-white table-hover">
                <thead>
                <tr class="d-flex">
                    <th class="col-4">Adres</th>
                    <th class="col">Liga</th>
                    <th class="col-1"></th>
                    <th class="col-1"></th>
                </tr>
                </thead>

                <tbody>
                @foreach ($stadiums as $stadium)
                    <tr class="d-flex">
                        <td class="col-4">{{$stadium->adress}}</td>
                        <td class="col">{{$stadium->league['name'] ?? ''}}</td>
                        <td class="col-1">
                            <a href="{{ route('admin.stadiums.edit',$stadium->id) }}" class="btn btn-success btn "
                               title="nowa hala">
                                Edytuj
                            </a></td>
                        <td class="col-1">
                            <form method="POST" action="{{ route('admin.stadiums.destroy', $stadium->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń halę">
                                    Usuń
                                </button>
                            </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
