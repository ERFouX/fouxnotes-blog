@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('title', 'FouX Notes | Create Post')

@section('content')
    <div class="blog-header">
        <h2>Create Post</h2>
    </div>

    <div class="blog-container">
        <div class="form-container">
            <h2 class="mb-4">Create New Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="post_title">Post Title</label>
                    <input id="post_title" type="text" name="title" class="form-input" placeholder="Enter post title" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_category">Category</label>
                    <select id="post_category" name="category" class="form-input" required>
                        <option value="">Select a category</option>
                        <option value="tech">Tech</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="education">Education</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_banner">Banner Image</label>
                    <input id="post_banner" type="file" name="banner" class="form-input" accept="image/*">
                    <p class="form-help">Optional: Upload a banner image for your post (JPEG, PNG, GIF up to 2MB)</p>
                </div>

                <div class="form-group">
                    <label class="form-label" for="post_content">Post Content</label>
                    <textarea id="post_content" name="content" class="form-input" placeholder="Write your post content here..." required rows="10"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
