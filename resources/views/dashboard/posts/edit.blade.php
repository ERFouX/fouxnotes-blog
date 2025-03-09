@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Edit Post')

@section('content')
    <div class="blog-header">
        <h2>Edit Post</h2>
    </div>

    <div class="blog-container">
        <div class="form-container">
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label" for="post_title">Post Title</label>
                    <input id="post_title" type="text" name="title" class="form-input" value="{{ $post->title }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_category">Category</label>
                    <select id="post_category" name="category" class="form-input" required>
                        <option value="">Select a category</option>
                        <option value="tech" {{ $post->category == 'tech' ? 'selected' : '' }}>Tech</option>
                        <option value="lifestyle" {{ $post->category == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                        <option value="education" {{ $post->category == 'education' ? 'selected' : '' }}>Education</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_banner">Banner Image</label>
                    <input id="post_banner" type="file" name="banner" class="form-input" accept="image/*">
                    <p class="form-help">Optional: Upload a new banner image (JPEG, PNG, GIF up to 2MB)</p>
                    @if($post->banner)
                        <div class="mt-4">
                            <p class="form-help">Current banner:</p>
                            <img src="{{ $post->banner }}" alt="Current banner" class="mt-2" style="max-height: 200px;">
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_content">Post Content</label>
                    <textarea id="post_content" name="content" class="form-input" required rows="10">{{ $post->content }}</textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
