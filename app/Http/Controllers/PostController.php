<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PostController extends Controller
{
    private function setActive($view, $data = [])
    {
        // Set active to 'posts'
        $data['active'] = 'posts';
        return view($view, $data);
    }

    public function index()
    {
        $posts = Post::all();
        return $this->setActive('dashboard.posts.index', compact('posts'));
    }
    
    public function create()
    {
        return $this->setActive('dashboard.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['date'] = Carbon::now();

        Post::create($data);
        return redirect()->route('posts.index')->with('successful', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return $this->setActive('dashboard.posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return $this->setActive('dashboard.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('successful', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('successful', 'Post deleted successfully.');
    }
}
