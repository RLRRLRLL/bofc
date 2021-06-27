<!DOCTYPE html>
<html class="h-full" lang="{{ app()->getLocale() }}">
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('includes.common.meta.favicon')
		<title>{{ config('app.name') }} | {{ __('Admin dashboard') }} | @yield('page_title')</title>
		
		{{-- styles --}}
		@livewireStyles
		<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
		@stack('styles')

		<style>
			@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap');

			html {
				font-size: 15px;
			}

			body {
				font-family: 'Roboto', sans-serif;
			}

			[x-cloak] {
				display: none;
			}
		</style>
	</head>

	<body class="antialiased">
		<div>
			<header class="py-5 bg-admin-secondary shadow">
				<div class="container">
					{{-- header inner --}}
					<div class="flex items-center justify-between">
						<ul class="flex items-center space-x-3">
							<x-admin.nav-items />
						</ul>

						@include('includes.main.partials.header.lang-switcher')
					</div>
				</div>
			</header>

			{{-- vue root --}}
			<div id="app">
				<app></app>
			</div>

			<main class="min-h-screen py-10 bg-dark">
				<div class="container">
					@yield('content')
				</div>
			</main>

			{{-- Alerts --}}
			<x-global.alertbox />
		</div>
		
		<!-- scripts -->
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
		{{-- scripts --}}
		<script src="{{ asset('js/admin.js') }}"></script>
		{{-- livewire --}}
		@livewireScripts
		{{-- alpine.js --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.1.1/cdn.min.js" defer></script>
		{{-- font awesome (replace later) --}}
		<script src="https://kit.fontawesome.com/7b1766dcee.js" crossorigin="anonymous"></script>
		{{-- additional --}}
		@stack('scripts')
	</body>
</html>