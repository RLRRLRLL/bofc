<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>[@yield('page-title')] {{ config('app.name') }}</title>
        @include('includes.common.favicon')
        @include('includes.main.sns.styles')
        @yield('styles')
    </head>
    <body>
        <main class="main">
			@include('includes.main.partials.header')
			@yield('content')
        </main>
        
        @include('includes.main.sns.scripts')
    </body>
</html>