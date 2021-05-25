<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" lang="{{ App::getLocale() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="@include('includes.common.meta.keywords')">
		<meta name="description" content="@include('includes.common.meta.description')">
        @include('includes.common.meta.favicon')
        <title>[ @yield('page-title') ] {{ config('app.name') }}</title>
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
		{{-- Styles --}}
		@livewireStyles
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')
    </head>
	{{-- "data-page" needed for js to define current page --}}
    <body class="no-arr outline-none" data-page="@yield('data-page')" data-app>
		{{-- Slide transition between pages --}}
		@include('includes.effects.page-transition')
		{{-- Header links hover distortion --}}
		@include('includes.effects.distortion-circle')
		{{-- Contact us modal --}}
		@include('includes.main.partials.modal')

		{{-- Wrapper --}}
		<div id="wrapper" class="flex flex-col justify-between" data-scroll-container>
			{{-- Header --}}
			@include('includes.main.partials.header')
			
			{{-- Main --}}
			@yield('content')

			{{-- Footer --}}
			@include('includes.main.partials.footer')
		</div>
        
		{{-- Scripts --}}
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
		@livewireScripts
		<script src="{{asset('js/scripts/app.js')}}" type="module" defer></script>
		@stack('scripts')
    </body>
</html>