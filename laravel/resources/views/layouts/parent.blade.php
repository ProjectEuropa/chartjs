<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
        @yield('pageCss')
        <!-- Javascript -->
        <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/js/fontawesome.js') }}"></script>
        <script src="{{ asset('/js/auth.js') }}"></script>
        @yield('pageJs')
    </head>
    <body>
        @include('navbar')
        @yield('content')
    </body>
</html>