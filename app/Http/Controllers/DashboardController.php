<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $active = 'dashboard';
        return view('dashboard.index', compact('posts', 'active'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->all());
        return redirect()->route('dashboard.index')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('dashboard.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('dashboard.index')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('dashboard.index')->with('success', 'Post deleted successfully.');
    }
}
