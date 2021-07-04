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
		<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
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
						{{-- burger --}}
						<div x-data="{ burgerActive: false }" x-cloak class="md:hidden flex items-center justify-center">
							<button type="button" @click="burgerActive = true" class="text-gray-100">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
								</svg>
							</button>

							{{-- menu --}}
							<div x-show.transition="burgerActive" class="fixed left-0 top-0 bottom-0 block w-full h-full overflow-hidden z-50 shadow bg-[rgb(21,21,37)]">
								<div class="container py-14">
									<div class="flex flex-col">
										{{-- header --}}
										<div class="flex items-center justify-between">
											<h3 class="text-3xl font-semibold text-white">
												{{ __('Menu') }}
											</h3>

											<button type="button" @click="burgerActive = false" class="text-gray-100">
												<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
													<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
												</svg>
											</button>
										</div>

										{{-- body --}}
										<div class="mt-20">
											<nav class="flex flex-col">
												<ul class="space-y-5">
													<x-admin.nav-items />
												</ul>
											</nav>
										</div>
									</div>
								</div>
							</div>
						</div>

						{{-- desktop --}}
						<ul class="hidden md:flex items-center space-x-3">
							<x-admin.nav-items />
						</ul>

						@include('includes.main.partials.header.lang-switcher')
					</div>
				</div>
			</header>

			<main class="min-h-screen py-10 bg-dark">
				<div class="container" id="app">
					@yield('content')
				</div>
			</main>

			{{-- Alerts --}}
			<x-global.alertbox />
		</div>
		
		<!-- scripts -->
		{{-- @if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif --}}
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