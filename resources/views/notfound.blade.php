<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('../css/main.css') }}">
    <title>FouX Notes | NotFound</title>
</head>
<body>
    <div class="sb">
    <a href="{{ route('home') }}">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="#about">About</a>
    </div>

    <div class="sb-container">
        <div class="blog-header">
            <h2>Blog Name</h2>
        </div>
        <div class="blog-container">
            <div class="blog-card">
                <div class="notfound">
                    <h1>404 | Not Found</h1>
                    <a href="{{ route('home') }}">Back To Home</a>
                </div>
            </div>
        </div>
        <div class="footer">
            <h2>Footer</h2>
            <p>This was inspired by W3 Schools.</p>
        </div>
    </div>
</body>
</html>