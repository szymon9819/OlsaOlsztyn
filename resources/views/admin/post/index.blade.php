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
        <table class="table text-white table-hover">
            <tr>
                <th>Tytuł</th>
                <th>Miniaturka</th>
                <th>Kategoria</th>
                <th>Publiczny</th>
                <th>Działanie</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{!!Str::limit($post->title, 25, ' (...) ')!!}</td>
                    <td>
                        @if(!empty($post->thumbnail))
                            <img width="75" src="{{asset($post->thumbnail)}}" alt="miniaturka">
                        @endif
                    </td>

                    <td>{{!empty($post->category()->get()) ? $post->category()->get()[0]->name:'' }}</td>

                    <td>{{$post->status? 'Tak': 'Nie'}}</td>

                    <td>
                        <a href="{{ route('admin.posts.edit',$post->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        </a>

                        <form id="deleteForm" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}"
                              accept-charset="UTF-8" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <a type="submit" onclick="$('#deleteForm').submit()" title="Delete post" class="ml-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor"
                                     class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd"
                                          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $posts->links() }}
        </table>
    </div>
@endsection
