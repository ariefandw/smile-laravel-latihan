@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="get" action="{{ route('post.index') }}">
                        <input type="text" name="q" value="{{ $q }}"><button type="submit">Cari</button>
                    </form>
                    <br></br>

                    <a class="btn btn-success" href="{{ route('post.create') }}">tambah</a>
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
                                    <a href="{{ route('post.show', $post->id) }}">show</a> 
                                    <a href="{{ route('post.edit', $post->id) }}">edit</a> 
                                    <button type="submit">delete</button>
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
