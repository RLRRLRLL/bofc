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

		<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
    </head>
	
    <body 
    	class="outline-none font-sans antialiased" 
    	data-page="@yield('data-page')" 
    	data-barba="wrapper"
    >
		{{-- Slide transition between pages --}}
		{{-- @include('includes.effects.page-transition') --}}

		{{-- Header links hover distortion --}}
		@include('includes.effects.distortion-circle')

		{{-- Contact us modal --}}
		@include('includes.main.partials.modal')

		{{-- Custom cursor --}}
		@include('includes.main.partials.cursor')

		{{-- Header (fixed) --}}
		@include('includes.main.partials.header')

		{{-- Wrapper --}}
		<div class="flex flex-col justify-between" data-barba="container" data-scroll-container>
			{{-- Main --}}
			@yield('content')

			{{-- Footer --}}
			@include('includes.main.partials.footer')
		</div>

		{{-- Scripts --}}
		@livewireScripts
		<script src="{{ asset('js/app.js') }}" type="module" defer></script>
		@stack('scripts')
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
    </body>
</html>