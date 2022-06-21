@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Judul: {{ $post->judul }}<br>
                    Pesan: {{ $post->pesan }}<br>
                    <a href="{{ route('post.index') }}">back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection