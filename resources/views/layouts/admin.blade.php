<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('includes.common.meta.favicon')
		<title>BOFC | Admin</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		@if (app()->isLocal())
			<script src="http://localhost:3000/browser-sync/browser-sync-client.js"></script>
		@endif
		@livewireStyles
		@stack('styles')
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
	</head>
	<body>
		<!-- wrapper -->
		<div class="grid">
			<header class="header">
				<ul class="header__left">
					<li>
						<button class="burger">
							<i class="fas fa-bars"></i>
						</button>
					</li>
					<li>
						<a href="/">{{ config('app.name') }}</a>
					</li>
				</ul>

				<ul class="header__right">
					@guest
						<li>
							<a href="/login">
								Login
							</a>
						</li>
						<li>
							<a href="/register">
								Register
							</a>
						</li>
					@endguest
				</ul>
			</header>

			<aside class="sidebar">
				<div class="sidebar__header"></div>

				<ul class="sidebar__nav">
					<li>
						<a href="/">
							<i class="fas fa-home"></i>
							Homepage
						</a>
					</li>
					<li>
						<a href="{{ route('create.new.pom', app()->getLocale()) }}">
							<i class="fas fa-plus"></i>
							Add pom
						</a>
					</li>
					<li>
						<a href="/admin">
							<i class="fas fa-dog"></i>
							Pomeranian
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fas fa-newspaper"></i>
							News
						</a>
					</li>
					<li>
						<a href="{{ route('settings', app()->getLocale()) }}">
							<i class="fas fa-cog"></i>
							Settings
						</a>
					</li>
				</ul>

				<button class="sidebar__close">&#10005;</button>
			</aside>

			<main class="main">
				@yield('content')
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