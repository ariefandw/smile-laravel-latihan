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
</x-app-layout>
