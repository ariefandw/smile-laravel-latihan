@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="get" action="{{ route('post.index') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="q" value="{{ $q }}" class="form-control" placeholder="Cari">
                            <button type="submit" class="input-group-text text-white bg-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>

                    <a class="btn btn-success btn-sm" href="{{ route('post.create') }}"><i class="fa-solid fa-plus"></i></a>
                    <table class="table table-sm">
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Pesan</th>
                            <th>Aksi</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->judul }}</td>
                            <td>{{ $post->pesan }}</td>
                            <td>
                                <form method="post" action="{{ route('post.destroy', $post->id) }}" onsubmit="return confirm('Apakah anda yakin?');">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-info" href="{{ route('post.show', $post->id) }}"><i class="fa-solid fa-eye"></i></a> 
                                        <a class="btn btn-warning" href="{{ route('post.edit', $post->id) }}"><i class="fa-solid fa-pencil"></i></a> 
                                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-times"></i></button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
