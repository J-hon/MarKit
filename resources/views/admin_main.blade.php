<!doctype html>
<html lang="en" class="no-js">

<head>
    @include('partials._head')
</head>

    <body>

        @include('partials._back-to-top')

        @include('partials._messages')

        @yield('content')

        @include('partials._javascript')

    </body>
</html>
