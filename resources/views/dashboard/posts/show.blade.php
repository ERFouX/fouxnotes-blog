@extends('layout')

@section('additional-css')
<style>
.post-container {
    width: 100%;
    margin: 0 auto;
    padding: 2rem;
    background-color: #1B1A55;
    border: 2px solid #535C91;
    margin-bottom: 1rem;
}

.blog-container {
    max-width: 900px;
    margin: 0 auto;
}

.blog-img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 4px;
}

.blog-fake-img {
    width: 100%;
    height: 400px;
    background-color: #535C91;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 4px;
}

.post-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 2rem 0;
    padding-bottom: 1rem;
    border-bottom: 2px solid #535C91;
}

.post-meta {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    color: rgba(255, 255, 255, 0.8);
    text-align: right;
    font-size: 0.875rem;
}

.post-meta span {
    display: flex;
    align-items: center;
    gap: 0.35rem;
}

.post-meta i {
    pointer-events: none;
    font-size: 0.875rem;
}

.post-title {
    font-size: 1.75rem;
    font-weight: 600;
    color: #ffffff;
}

.post-content {
    line-height: 1.8;
}

.post-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 2px solid #535C91;
}

.post-actions .btn,
.post-actions form {
    flex: 1;
}

.post-actions .btn {
    width: 100%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
    padding: 0.75rem;
    font-size: 0.875rem;
    border: 2px solid #535C91;
    background: none;
    color: #ffffff;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
}

.post-actions .btn:hover {
    text-decoration: none;
}

.post-actions .btn i {
    font-size: 0.875rem;
    pointer-events: none;
}

.post-actions .back {
    border-color: #0d4380;
}

.post-actions .edit {
    border-color: #155724;
}

.post-actions .delete {
    border-color: #721c24;
}

.post-actions .back:hover {
    background-color: #0d4380;
    border-color: #70A1FF;
    color: #70A1FF;
}

.post-actions .edit:hover {
    background-color: #155724;
    border-color: #c3e6cb;
    color: #c3e6cb;
}

.post-actions .delete:hover {
    background-color: #721c24;
    border-color: #f5c6cb;
    color: #f5c6cb;
}
</style>
@endsection

@section('content')
<div class="post-container">
    <div class="blog-container">
        @if($post->banner)
            <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="blog-img">
        @else
            <div class="blog-fake-img">No Image</div>
        @endif

        <div class="post-header">
            <h1 class="post-title">{{ $post->title }}</h1>
            <div class="post-meta">
                @if($post->category)
                    <span>
                        <i class="fa fa-folder-open"></i>
                        {{ $post->category }}
                    </span>
                @endif
                <span>
                    <i class="fa fa-calendar"></i>
                    {{ $post->date instanceof \Carbon\Carbon ? $post->date->format('M d, Y') : $post->date }}
                </span>
                <span>
                    <i class="fa fa-user"></i>
                    {{ $post->user ? $post->user->username : 'Deleted User' }}
                </span>
            </div>
        </div>

        <div class="post-content">
            {!! nl2br(e($post->content)) !!}
        </div>

        @auth
            <div class="post-actions">
                <a href="{{ route('home') }}" class="btn back">
                    <i class="fa fa-arrow-left"></i>
                    <span>Back</span>
                </a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn edit">
                    <i class="fa fa-edit"></i>
                    <span>Edit</span>
                </a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn delete" onclick="return confirm('Are you sure you want to delete this post?')">
                        <i class="fa fa-trash"></i>
                        <span>Delete</span>
                    </button>
                </form>
            </div>
        @endauth
    </div>
</div>
@endsection 