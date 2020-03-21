<!doctype html>
<html lang="en" class="no-js">

<head>
    @include('partials._head')
</head>

    <body>

        @include('partials._nav')

        @include('partials._back-to-top')

        @include('partials._messages')

        @yield('content')

        @include('partials._footer')

        @include('partials._javascript')

    </body>
</html>
