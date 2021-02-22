<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords"
		content="pomeranian, bubbles of champain, dog, dogs, poms, spitz, spitz baku">
        <title>[ @yield('page-title') ] {{ config('app.name') }}</title>
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
        @include('includes.common.favicon')
		@livewireStyles
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        @yield('styles')
    </head>
    <body x-data="{ modalTransitionFinished: false }" x-ref="body">
		@include('includes.common.distortion-circle')
		@include('includes.main.partials.modal')
		
        <main class="main">
			@include('includes.main.partials.header')
			@yield('content')
        </main>
        
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
		@livewireScripts
		<script src="{{asset('js/scripts/main.js')}}" type="module" defer></script>
		@stack('scripts')
    </body>
</html>