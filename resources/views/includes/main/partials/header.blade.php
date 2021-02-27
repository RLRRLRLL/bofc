<header class="header" data-scroll-section>
	<div class="container">
		<!-- desktop -->
		<nav class="header__desktop">
			<ul>
				<li>
					<a class="link leave-page {{ checkLinks('/') }}" href="/" >
						<span class="link-text">Welcome!</span>
					</a>
				</li>
				<li>
					<a class="link leave-page {{ checkLinks('pomeranian') }}" href="/pomeranian">
						<span class="link-text">Pomeranian</span>
					</a>
				</li>
				<li>
					<a class="link leave-page {{ checkLinks('gallery') }}" href="{{ route('gallery') }}">
						<span class="link-text">Gallery</span>
					</a>
				</li>
				<li>
					<a class="link leave-page {{ checkLinks('news') }}" href="#">
						<span class="link-text">News</span>
					</a>
				</li>
				<li>
					<a class="link {{ checkLinks('dashboard') }}" href="/admin">
						<span class="link-text">Dashboard</span>
					</a>
				</li>
				<li class="enough-padding">
					<button class="btn-split btn-bestia contact-modal-trigger">
						<span>Get in touch</span>
					</button>
				</li>
			</ul>
		</nav>	

		<!-- mobile -->
	</div>
</header>