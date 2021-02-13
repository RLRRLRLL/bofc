<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords"
		content="pomeranian, bubbles of champain, dog, dogs, poms, spitz, spitz baku">
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
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