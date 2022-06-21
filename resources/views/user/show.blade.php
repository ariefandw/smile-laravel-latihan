@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">
                    <form>
                        <div class="row mb-2">
                            <label class="col-sm-2">Name</label>
                            <div class="col-sm-10">{{ $user->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-10">{{ $user->email }}</div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-2">Posts:</label>
                            <div class="col-sm-10">
                                <table class="table table-sm">
                                    <tr>
                                        <th>Judul</th>
                                        <th>Pesan</th>
                                    </tr>
                                    @foreach($user->posts as $post)
                                    <tr>
                                        <td>{{ $post->judul }}</td>
                                        <td>{{ $post->pesan }}</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </form>
                    <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection