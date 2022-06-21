@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Comment') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ $action == 'edit' ? route('comment.update', $comment->id) : route('comment.store') }}">
                        @csrf
                        @if($action == 'edit') @method('PUT') @endif
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Teks</label>
                            <textarea name="teks" class="form-control">{{ $comment->teks }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
