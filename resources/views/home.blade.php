@extends('layout')

@section('title', 'FouX Notes')

@section('content')
<div class="blog-header">
    <h2>FouX Notes</h2>
</div>

<div class="blog-container">
    <div class="blog-left">
        <div class="blog-card">
            <h2>TITLE HEADING</h2>
            <h5>Title description, Dec 7, 2017</h5>
            <div class="blog-fake-img" style="height: 200px">Image</div>
            <p>Some text..</p>
        </div>
        <div class="blog-card">
            <h2>TITLE HEADING</h2>
            <h5>Title description, Sep 2, 2017</h5>
            <div class="blog-fake-img" style="height: 200px">Image</div>
            <p>Some text..</p>
        </div>
    </div>
    <div class="blog-right">
        <div class="blog-card">
            <h2>About Me</h2>
            <div class="blog-fake-img" style="height: 100px">Image</div>
            <p>
            Some text about me in culpa qui officia deserunt mollit anim..
            </p>
        </div>

        <!--Image Strips-->
        <div class="blog-card">
            <h3>Popular Post</h3>
            <div class="blog-fake-img">Image</div>
            <br />
            <div class="blog-fake-img">Image</div>
            <br />
            <div class="blog-fake-img">Image</div>
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