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
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Tytuł</th>
                    <th>Treść</th>
                    <th>Kategoria</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>{{$post->content}}</td>
                        @if ($post->status)
                            <td>Opublikowany</td>
                        @else
                            <td>Nieopublikowany</td>
                        @endif

                        <td>
                            <a href="{{ route('admin.posts.edit',$post->id) }}" class="btn btn-success btn "
                               title="nowy post">
                                Edytuj
                            </a></td>
                        <td>
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
