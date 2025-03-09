@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../../css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Posts')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            Create New Post
        </a>
    </div>

    @if($posts->count() > 0)
        <div class="posts-container">
            @foreach($posts as $post)
                <div class="post-card">
                    @if($post->banner)
                        <img src="{{ asset($post->banner) }}" alt="{{ $post->title }}" class="post-card__image">
                    @else
                        <div class="post-card__image bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No Image</span>
                        </div>
                    @endif
                    
                    <div class="post-card__content">
                        <h2 class="post-card__title">{{ $post->title }}</h2>
                        <p class="post-card__excerpt">
                            {{ Str::limit($post->content, 100) }}
                        </p>
                        
                        <div class="post-card__meta">
                            <span>{{ $post->category }}</span>
                            <span>{{ $post->date }}</span>
                            <span>{{ $post->user ? $post->user->username : 'Deleted User' }}</span>
                        </div>

                        <div class="post-card__actions">
                            <a href="{{ route('posts.show', $post->id) }}" class="view">
                                View
                            </a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="edit">
                                Edit
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"
                                        onclick="return confirm('Are you sure you want to delete this post?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-12">
            <p class="text-gray-500">No posts found.</p>
        </div>
    @endif
</div>
@endsection

