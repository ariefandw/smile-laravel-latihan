@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form>
                        <div class="row mb-2">
                            <label class="col-sm-2">Judul</label>
                            <div class="col-sm-10">{{ $post->judul }}</div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-2">Pesan</label>
                            <div class="col-sm-10">{{ $post->pesan }}</div>
                        </div>
                    </form>
                    <a class="btn btn-primary" href="{{ route('post.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection