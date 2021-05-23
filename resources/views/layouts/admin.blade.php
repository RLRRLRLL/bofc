<!DOCTYPE html>
<html class="h-full">
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('includes.common.meta.favicon')
		<title>{{ config('app.name') }} | {{ __('Admin dashboard') }} | @yield('page_title')</title>
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
		@livewireStyles
		<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
		{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
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
		<div class="">
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

			<main class="min-h-screen py-10 bg-dark">
				<div class="container">
					@yield('content')
				</div>
			</main>
		</div>
		
		<!-- scripts -->
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
		<script src="https://kit.fontawesome.com/7b1766dcee.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/scripts/admin.js') }}"></script>
		@livewireScripts
		@stack('scripts')
	</body>
</html>