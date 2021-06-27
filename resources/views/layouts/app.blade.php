<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="box-border no-js">
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
	
    <body 
    	class="relative outline-none font-golos antialiased" 
    	data-page="@yield('data-page')" 
    >
		{{-- Blur filter | change standart deviation to adjust --}}
		<svg style="position: absolute; width: 0; height: 0;">
			<filter id="blur" x="-20%" y="-20%" width="150%" height="150%">
				<feGaussianBlur in="SourceGraphic" stdDeviation="7" />
			</filter>
		</svg>

		@include('includes.main.partials.header')
	
		<main	
			data-scroll-container
			class="flex flex-col justify-between"
			style="z-index: 101"
		>
			{{-- Slide transition between pages --}}
			{{-- @include('includes.effects.page-transition') --}}

			{{-- Header links hover distortion --}}
			@include('includes.effects.distortion-circle')

			{{-- Contact us modal --}}
			{{-- @include('includes.main.partials.modal') --}}

			{{-- Custom cursor --}}
			{{-- @include('includes.main.partials.cursor') --}}

			{{-- Main --}}
			@yield('content')

			{{-- Footer --}}
			{{-- @include('includes.main.partials.footer') --}}
		</main>

		{{-- Scripts --}}
		@livewireScripts
		<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
		<script src="{{ asset('js/app.js') }}" type="module" defer></script>
		@stack('scripts')
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
    </body>
</html>