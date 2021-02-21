<header class="header">
	<!-- desktop -->
	<nav class="header__desktop">
		<ul>
			<li>
				<a class="link {{ checkLinks('/') }}" href="/" >
					Welcome!
				</a>
			</li>
			{{-- <li>
				<a class="link" href="#">
						About
				</a>
			</li> --}}
			<li>
				<a class="link {{ checkLinks('pomeranian') }}" href="/pomeranian">
					Pomeranian
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
				<button>
					Get in touch
					<span></span>
				</button>
			</li>
		</ul>
	</nav>

	<!-- mobile -->
</header>