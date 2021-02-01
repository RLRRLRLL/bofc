<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
	</head>
	<body >
		<div class="grid">
			<header class="header">
				<ul class="header__left">
					<li>
						<a href="#" class="burger">
							<i class="fas fa-bars"></i>
						</a>
					</li>
					<li>
						<a href="/">
							{{ config('app.name') }}
						</a>
					</li>
				</ul>

				<ul class="header__right">
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
				</ul>
			</header>

			<aside class="sidebar">
				<div class="sidebar__header">
				</div>

				<ul class="sidebar__nav">
					<p>Menu</p>

					<li>
						<a href="/">
							<i class="fas fa-home"></i>
							Homepage
						</a>
					</li>
					<li>
						<a href="{{ route('add.new.pom') }}">
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
						<a href="#">
							<i class="fas fa-cog"></i>
							Settings
						</a>
					</li>
					<li>
						<a href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fas fa-sign-out-alt"></i>
							Sign out
							<form id="logout-form" 
									action="{{ route('logout') }}" 
									method="POST" 
									class="d-none">
								@csrf
							</form>
						</a>
					</li>
				</ul>
			</aside>

			<main class="main">
				<div class="container">
					@yield('content')
				</div>
			</main>
		</div>
		
		<!-- scripts -->
		<script src="https://kit.fontawesome.com/7b1766dcee.js" crossorigin="anonymous"></script>
		<script src="{{ asset('js/scripts/admin.js') }}"></script>
	</body>
</html>