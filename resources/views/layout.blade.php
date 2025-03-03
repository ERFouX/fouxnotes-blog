    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="{{ asset('../css/main.css') }}">
        <!-- Additional Css Links-->
        @yield('additional-css')
        <!---->
        <title>@yield('title')</title>
    </head>
    <body>
        <div class="sb">
            <a class="{{ $active === 'home' ? 'sb-active' : '' }}" href="{{ route('home') }}">Home</a>
            
            @guest
                <a class="{{ $active === 'login' ? 'sb-active' : '' }}" href="{{ route('login') }}">Login</a>
                <a class="{{ $active === 'register' ? 'sb-active' : '' }}" href="{{ route('register') }}">Register</a>
            @endguest

            @auth
                @if (Auth::user()->role === 'author')
                    <a class="{{ $active === 'dashboard' ? 'sb-active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    
                    <!-- Only show these links when on the dashboard -->
                    @if ($active === 'dashboard' || $active === 'posts' || $active === 'categories' || $active === 'settings')
                        <div>
                            <a class="{{ $active === 'posts' ? 'sb-active' : '' }}" href="{{ route('posts.index') }}">- Posts</a>
                            <a class="{{ $active === 'categories' ? 'sb-active' : '' }}" href="#">- Categories</a>
                            <a class="{{ $active === 'settings' ? 'sb-active' : '' }}" href="#">- Settings</a>
                        </div>
                    @endif
                @elseif (Auth::user()->role === 'viewer')
                    <a class="{{ $active === 'saved' ? 'sb-active' : '' }}" href="#">Saved</a>
                @endif
            @endauth

            <a class="{{ $active === 'about' ? 'sb-active' : '' }}" href="{{ route('about') }}">About</a>

            <div class="spacer"><!-- Spacer to push logout button to the bottom --></div>
            
            @auth
                <button class="logout-button" onclick="confirmLogout()">
                    Logout ({{ Auth::user()->username }})
                </button>
            @endauth
        </div>

        <!-- Logout Warning Script -->
        <script>
            function confirmLogout() {
                if (confirm("Are you sure you want to log out?")) {
                    document.querySelector('form#logout-form').submit();
                }
            }
        </script>
        <!-- Logout Action -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <!-- Alerts -->
        <div class="sb-container">
        @if (session('successful'))
        <div class="alert alert-success">
                {{ session('successful') }} <b>{{ Auth::user()->username }}</b>
            </div>
        @endif
        @if (session('logged_out'))
            <div class="alert alert-danger">
                {{ session('logged_out') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Content -->
        @yield('content')

        <!-- Footer -->
        <div class="footer">
            <h2>Footer</h2>
            <p>Made with love by <a href="{{ route('about') }}">ERFouX</a></p>
        </div>
    </div>
    </body>
    </html>
