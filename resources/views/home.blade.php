@extends('layout')

@section('title', 'FouX Notes')

@section('additional-css')
<style>
.blog-img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 4px;
}

.blog-fake-img {
    width: 100%;
    height: 200px;
    background-color: #aaa;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    border-radius: 4px;
}

.popular-post-img {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 4px;
    margin-bottom: 10px;
}
</style>
@endsection

@section('content')
<div class="blog-header">
    <h2>FouX Notes</h2>
</div>

<div class="blog-container">
    <div class="blog-left">
        @if($posts->count() > 0)
            @foreach($posts as $post)
                <div class="blog-card">
                    <h2>{{ $post->title }}</h2>
                    <h5>{{ $post->date instanceof \Carbon\Carbon ? $post->date->format('M d, Y') : $post->date }}</h5>
                    @if($post->banner)
                        <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="blog-img">
                    @else
                        <div class="blog-fake-img">No Image</div>
                    @endif
                    <p>{{ Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="blog-read-more">Read More</a>
                </div>
            @endforeach
        @else
            <div class="blog-card">
                <p>No posts found.</p>
            </div>
        @endif
    </div>

    <div class="blog-right">
        <div class="blog-card">
            <h2>About Me</h2>
            <div class="blog-fake-img" style="height: 100px">Image</div>
            <p>
            Some text about me in culpa qui officia deserunt mollit anim..
            </p>
        </div>

        <!--Popular Posts-->
        <div class="blog-card">
            <h3>Popular Post</h3>
            @if(isset($popularPosts) && $popularPosts->count() > 0)
                @foreach($popularPosts as $post)
                    @if($post->banner)
                        <img src="{{ $post->banner }}" alt="{{ $post->title }}" class="popular-post-img">
                    @else
                        <div class="blog-fake-img" style="height: 150px">No Image</div>
                    @endif
                    <h4 class="mb-4">{{ $post->title }}</h4>
                @endforeach
            @else
                <div class="blog-fake-img">Image</div>
                <br>
                <div class="blog-fake-img">Image</div>
                <br>
                <div class="blog-fake-img">Image</div>
            @endif
        </div>

        <!--Social Media-->
        <div class="blog-card" id="social-media">
            <h3>Follow Me</h3>

            <!-- Add font awesome icons -->
            <a href="https://instagram.com/ERFouX" class="fa fa-instagram"></a>
            <a href="https://linkedin.com/in/ERFouX" class="fa fa-linkedin"></a>
            <a href="https://twitter.com/ERFouX" class="fa fa-twitter"></a>
            <a href="https://youtube.com/c/ERFouX" class="fa fa-youtube"></a>   
        </div>
    </div>
</div>
@endsection