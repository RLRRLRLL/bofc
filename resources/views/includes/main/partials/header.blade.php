<header class="header">
	<!-- desktop -->
	<nav class="header__desktop">
		<ul>
			<li>
				<a class="link {{ checkLinks('/') }}" href="/" >
					Welcome!
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('pomeranian') }}" href="/pomeranian">
					Pomeranian
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('gallery') }}" href="{{ route('gallery') }}">
					Gallery
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('news') }}" href="#">
					News
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('contact') }}" href="#">
					Contact
				</a>
			</li>
			<li>
				<a class="link {{ checkLinks('dashboard') }}" href="/admin">
					Dashboard
				</a>
			</li>
			<li class="enough-padding">
				<button class="btn-ripple btn-split" x-on:click="$refs.overlay.classList.remove('out'); $refs.overlay.classList.add('split'); setTimeout(() => modalTransitionFinished = true, 350); stopBubbles()">
					Get in touch
				</button>
			</li>
		</ul>
	</nav>

	<!-- mobile -->
</header>