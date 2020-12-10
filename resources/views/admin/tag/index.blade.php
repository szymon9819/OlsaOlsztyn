@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Tagi</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.tags.create') }}" class="btn btn-success btn mb-3" title="nowy tag">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj nowy tag
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td class="col-md" >{{$tag->name}}</td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.tags.edit',$tag->id) }}" class="btn btn-success btn "
                               title="nowy tag">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
                            <form method="POST" action="{{ route('admin.tags.destroy', $tag->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Usuń post">
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
