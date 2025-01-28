<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <!-- Add StyleSheet -->
    <link rel="stylesheet" href="{{ asset('../css/main.css') }}">
    <title>FouX Notes</title>
</head>
<body>

    <!--Responsive Sidebar-->
    <div class="sb">
    <a class="sb-active" href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    </div>

    <!--Responsive Sidebar Container/Content-->
    <div class="sb-container">
    <!--Blog Header-->
    <div class="blog-header">
        <h2>Blog Name</h2>
    </div>

    <!--Blog Contents-->
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

    <!--Footer-->
        <div class="footer">
            <h2>Footer</h2>
            <p>This was inspired by W3 Schools.</p>
        </div>
    </div>
</body>
</html>