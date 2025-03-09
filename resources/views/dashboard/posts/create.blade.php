@extends('layout')

@section('additional-css')
    <link rel="stylesheet" href="{{ asset('../../css/login.css') }}">
@endsection

@section('title', 'FouX Notes | Create Post')

@section('content')
    <div class="blog-header">
        <h2>Create Post</h2>
    </div>

    <div class="blog-container">
        <div class="login-card login-padding">
            <h2>Create Post</h2>
            <form action="{{ route('posts.store') }}" method="POST" class="form login">
                @csrf
                <div class="form__field">
                    <label for="post_title">
                        <span class="hidden">Post Title</span>
                    </label>
                    <input id="post_title" type="text" name="title" class="form__input" placeholder="Post Title" required>
                </div>

                <div class="form__field">
                    <label for="post_content">
                        <span class="hidden">Post Content</span>
                    </label>
                    <textarea id="post_content" name="content" class="form__input" placeholder="Post Content" required></textarea>
                </div>

                <div class="form__field">
                    <label for="post_category">
                        <span class="hidden">Category</span>
                    </label>
                    <select id="post_category" name="category" class="form__input" required>
                        <option value="">Select Category</option>
                        <option value="tech">Tech</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="education">Education</option>
                    </select>
                </div>

                <div class="form__field">
                    <input type="submit" value="Create Post">
                </div>
            </form>
        </div>
    </div>
@endsection
