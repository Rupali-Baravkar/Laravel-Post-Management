<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|file|mimes:jpg,svg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('images', 'public');
        }

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filePath
        ]);
        return redirect()->route('posts')->with('success', 'Post created successfully..!');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|file|mimes:jpg,svg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filePath = $file->store('images', 'public');
        }
        
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $filePath
        ]);
        return redirect()->route('posts')->with('success', 'Post updated successfully..!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts')->with('success', 'Post deleted successfully..!');
    }
}
