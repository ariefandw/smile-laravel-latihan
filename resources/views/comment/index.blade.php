@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="get" action="{{ route('comment.index') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari">
                            <button type="submit" class="input-group-text text-white bg-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                    <a class="btn btn-success btn-sm" href="{{ route('comment.create') }}"><i class="fa-solid fa-plus"></i></a>
                    <table class="table table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Teks</th>
                            <th>Pemilik Post</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->teks }}</td>
                            <td>{{ $comment->post->user->name }}</td>
                            <td>
                                <form method="comment" action="{{ route('comment.destroy', $comment->id) }}" onsubmit="return confirm('Apakah anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-info" href="{{ route('comment.show', $comment->id) }}"><i class="fa-solid fa-eye"></i></a> 
                                        <a class="btn btn-warning" href="{{ route('comment.edit', $comment->id) }}"><i class="fa-solid fa-pencil"></i></a> 
                                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-times"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
