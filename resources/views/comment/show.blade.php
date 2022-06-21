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
                            <label class="col-sm-2">Teks</label>
                            <div class="col-sm-10">{{ $comment->teks }}</div>
                        </div>
                    </form>
                    <a class="btn btn-primary" href="{{ route('comment.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection