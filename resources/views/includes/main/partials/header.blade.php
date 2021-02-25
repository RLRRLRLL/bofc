<header class="header slideInDown" data-animation="slideInDown" data-animation-delay="150ms">
	<!-- desktop -->
	<nav class="header__desktop">
		<ul>
			<li>
				<a class="link {{ checkLinks('/') }}" href="/" >
					<span class="link-text">Welcome!</span>
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('pomeranian') }}" href="/pomeranian">
					<span class="link-text">Pomeranian</span>
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('gallery') }}" href="{{ route('gallery') }}">
					<span class="link-text">Gallery</span>
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('news') }}" href="#">
					<span class="link-text">News</span>
				</a>
			</li>
			{{-- <li>
				<a class="link {{ checkLinks('dashboard') }}" href="/admin">
					<span class="link-text">Dashboard</span>
				</a>
			</li> --}}
			<li class="enough-padding">
				<button 
					class="btn-split button--bestia" 
					x-on:click="
						$refs.overlay.classList.remove('out'); 
						$refs.overlay.classList.add('split'); 
						setTimeout(() => modalTransitionFinished = true, 350)
					">
					<div class="button__bg"></div>
					<span>Get in touch</span>
				</button>
			</li>
		</ul>
	</nav>

	<!-- mobile -->
</header>