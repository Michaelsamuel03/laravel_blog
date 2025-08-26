<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Laravel Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Blog</a>
            <div>
                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">+ New Post</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login.form') }}" class="btn btn-primary btn-sm">Login</a>
                    <a href="{{ route('register.form') }}" class="btn btn-secondary btn-sm">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
       
        @yield('content')
    </div>
     <footer>
        <p>© 2025 My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
  


