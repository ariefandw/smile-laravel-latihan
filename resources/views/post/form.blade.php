@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ $action == 'edit' ? route('post.update', $post->id) : route('post.store') }}">
                        @csrf
                        @if($action == 'edit') @method('PUT') @endif
                        Judul<br>
                        <input type="text" name="judul" value="{{ $post->judul }}"><br>
                        Pesan<br>
                        <textarea name="pesan">{{ $post->pesan }}</textarea><br>
                        <button type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
