<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('page-title') | Bubbles of champain</title>

        @include('includes.common.favicon')
        @include('includes.main.styles')
        @yield('page-styles')
        @include('includes.main.scripts')
    </head>
    <body>
        @include('includes.main.nav')
        
        <div class="wrapper">
            <div class="cursor"></div>

            <div class="content">
                @yield('page-content')
            </div>
        </div>
    </body>
</html>