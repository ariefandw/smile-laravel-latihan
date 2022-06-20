<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
</x-app-layout>
