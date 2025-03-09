<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')
            ->orderBy('date', 'desc')
            ->get();

        $popularPosts = Post::with('user')
            ->orderBy('date', 'desc')
            ->take(3)
            ->get();

        return view('home', [
            'posts' => $posts,
            'popularPosts' => $popularPosts,
            'active' => 'home'
        ]);
    }
}
