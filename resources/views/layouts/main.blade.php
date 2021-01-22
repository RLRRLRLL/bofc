<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('page-title'). {{ config('app.name') }}</title>

        @include('includes.common.favicon')
        @include('includes.main.styles')
        @yield('styles')
    </head>
    <body>
        <main class="main">
            @include('includes.main.nav')
            @yield('content')
        </main>
        
        @include('includes.main.scripts')
    </body>
</html>