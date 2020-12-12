@extends('layouts.admin')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="card-header">
        <h3><strong>Posty</strong></h3>
    </div>
    <div class="card-body">
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success btn mb-3" title="nowy post">
            <i class="fa fa-plus" aria-hidden="true"></i> Dodaj nowy post
        </a>
        <div class="table-responsive">
            <table class="table table-striped table-sm text-white ">
                <thead>
                <tr class="d-flex">
                    <th class="col-2">>Tytuł</th>
                    <th class="col-4">Treść</th>
                    <th class="col-2">Kategoria</th>
                    <th class="col-2">Status</th>
                    <th class="col-1"></th>
                    <th class="col-1"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr class="bg-dark d-flex">
                        <td class="col-2">{{$post->title}}</td>
                        <td class="col-4">{!! Str::limit($post->content, 30, ' (...) ') !!}</td>
                        <td class="col-2">{{!empty($post->category()->get()) ? $post->category()->get()[0]->name:'' }}</td>
                        @if ($post->status)
                            <td class="col-2">Opublikowany</td>
                        @else
                            <td class="col-2">Nieopublikowany</td>
                        @endif

                        <td class="col-1">
                            <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-success btn "
                               title="nowy post">
                                Edytuj
                            </a></td>
                        <td class="col-1">
                            <form method="POST" action="{{ route('admin.posts.destroy', $post->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                @csrf
                                <button type="submit" class="btn btn-danger btn" title="Delete post">
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
