<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="box-border">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="@include('includes.common.meta.keywords')">
		<meta name="description" content="@include('includes.common.meta.description')">
        @include('includes.common.meta.favicon')
        <title>[ @yield('page-title') ] {{ config('app.name') }}</title>
		
		{{-- Styles --}}
		@livewireStyles
        <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')
    </head>
	{{-- "data-page" needed for js to define current page --}}
    <body class="no-arr outline-none font-sans antialiased" data-page="@yield('data-page')">
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
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
		@livewireScripts
		<script src="{{asset('js/app.js')}}" type="module" defer></script>
		@stack('scripts')
    </body>
</html>