@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Sezony</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.seasons.create') }}" class="btn btn-success btn mb-3" title="nowy sezon">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj sezon
        </a>
        <div class="table-responsive">
            <table class="table text-white table-hover">
                <thead>
                <tr>
                    <th>Sezon</th>
                    <th>Ligi</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($seasons as $season)
                    <tr>
                        <td>{{$season->season}}</td>
                        <td class="col-md">
                        @foreach($season->leagues as $league)
                           {{$league->name}}
                        @endforeach
                        </td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.seasons.edit',$season->id) }}" class="btn btn-success btn "
                               title="nowy sezon">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
                            <form method="POST" action="{{ route('admin.seasons.destroy', $season->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń Sezon">
                                    Usuń
                                </button>
                            </form>
                    </tr>
                @endforeach
                {{$seasons->links()}}

                </tbody>
            </table>
        </div>
    </div>
@endsection
