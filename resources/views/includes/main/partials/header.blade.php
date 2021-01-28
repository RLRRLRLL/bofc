<header class="header">
	<!-- desktop -->
	<nav class="header__desktop">
		<ul>
			<li>
				<a href="/" >
					<span data-text="Welcome!">
						Welcome!
					</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span data-text="About">
						About
					</span>
				</a>
			</li>
			<li>
				<a href="/pomeranian">
					<span data-text="Pomeranian">
						Pomeranian
					</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span data-text="News">
						News
					</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span data-text="Contact">
						Contact
					</span>
				</a>
			</li>
			<li class="enough-padding">
				<button id="pop-btn" href="#" class="desk_cta pop-thingy" style="filter: url('#pop')">
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" class="svg-filters">
						<defs>
							<filter id="pop">
								<feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur"></feGaussianBlur>
								<feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"></feColorMatrix>
								<feComposite in="SourceGraphic" in2="goo"></feComposite>
							</filter>
						</defs>
					</svg>
					• Get in touch •
					<span class="pop-thingy__bg"></span>
				</button>
			</li>
		</ul>
	</nav>

	<!-- mobile -->
</header>