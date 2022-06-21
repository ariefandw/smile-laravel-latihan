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
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ $post->judul }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Kategori</label>
                            <select class="form-control" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <textarea name="pesan" class="form-control">{{ $post->pesan }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <textarea name="pesan" class="form-control">{{ $post->pesan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
