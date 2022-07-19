<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
    
    <link href="/css/boot_css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
     @include('header')
    </header>
    <br>
    <div class="container">
     @yield('content')
    </div>
    <footer class="footer bg-dark  fixed-bottom">
    @include('footer')
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/boot_js/bootstrap.min.js"></script>
</body>
</html>