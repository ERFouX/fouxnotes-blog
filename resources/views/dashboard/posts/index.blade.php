@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Posts')

@section('content')
    <div class="blog-header">
        <h2>Posts</h2>
    </div>

    <div class="create-post-button">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    <div class="blog-container">
        <div class="posts-container">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="post-card">
                        @if($post->banner)
                            <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="post-card__image">
                        @else
                            <div class="post-card__image" style="background: #535C91; display: flex; align-items: center; justify-content: center;">
                                <span style="color: rgba(255, 255, 255, 0.5);">No Image</span>
                            </div>
                        @endif
                        
                        <div class="post-card__content">
                            <h2 class="post-card__title">{{ $post->title }}</h2>
                            <p class="post-card__excerpt">
                                {{ Str::limit($post->content, 200) }}
                            </p>
                            
                            <div class="post-card__meta">
                                @if($post->category)
                                    <span>{{ $post->category }}</span>
                                @endif
                                <span>{{ $post->date instanceof \Carbon\Carbon ? $post->date->format('M d, Y') : $post->date }}</span>
                                <span>{{ $post->user ? $post->user->username : 'Deleted User' }}</span>
                            </div>

                            <div class="post-card__actions">
                                <a href="{{ route('posts.show', $post->id) }}" class="view">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="edit">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this post?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="post-card">
                    <div class="post-card__content">
                        <p class="text-center">No posts found.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

