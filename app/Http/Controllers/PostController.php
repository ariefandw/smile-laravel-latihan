<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::where('judul', 'LIKE', "%$request->q%")
            ->orWhere('pesan', 'LIKE', "%$request->q%")
            ->paginate(3);
        $q = $request->q;
        return view('post.index', compact('posts', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = 'create';
        $post = new Post();
        $categories = Category::get();
        return view('post.form', compact('post', 'action', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:25',
            'pesan' => 'required|min:10',
        ]);
        $post = new Post();
        $post->fill($request->all());
        $post->user_id = auth()->user()->id;
        $post->save();
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $action = 'edit';
        $categories = Category::get();
        return view('post.form', compact('post', 'action', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // $post->judul = $request->judul;
        // $post->pesan = "Pesan oleh user: " . $request->judul;
        $post->fill($request->all());
        $post->save();
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
