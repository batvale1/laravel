<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section('title')@show</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="header">
        @include('menu')
        <hr>
    </header>
    @if(session('success'))
        <div class="container">
            <div class="alert alert-success fade show">
                {{session('success')}}
            </div>
        </div>
    @endif
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        <h2>Footer</h2>
    </footer>
</body>
</html>
