<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller //all the classes wether post aw auth extends el main el hwa controller
{
    //  posts
    public function index() {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // to see a single post
    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    // create form
    public function create() {
        return view('posts.create');
    }

   
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(),
        ]);

        return redirect('/posts');
    }

    // how to edit a post >>
    public function edit(Post $post) {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }
        return view('posts.edit', compact('post'));
    }

    // Update post
    public function update(Request $request, Post $post) {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->only('title', 'content'));
        return redirect('/posts');
    }

    // Delete post
    public function destroy(Post $post) {
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();
        return redirect('/posts');
    }
}
