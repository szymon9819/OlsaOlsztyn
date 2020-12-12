@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Kategorie</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-success btn mb-3" title="nowa kategoria">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj nową kategorię
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-sm text-white">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="col-md" >{{$category->name}}</td>

                        <td class="col-md-1">
                            <a href="{{ route('admin.categories.edit',$category->id) }}" class="btn btn-success btn "
                               title="nowa kategoria">
                                Edytuj
                            </a></td>
                        <td class="col-md-1">
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}"
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
