<header class="header" data-scroll-section x-data="{ showBurgerMenu: false }">
	<div class="container px-24">
		<div class="header__inner">
			{{-- Navigation: desktop --}}
			<nav class="header__desktop">
				@include('includes.main.partials.header.nav-menu')
			</nav>

			{{-- Btn burger --}}
			<button class="header__burger--trigger" x-on:click="showBurgerMenu = !showBurgerMenu">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 21 21">
					<g fill="none" fill-rule="evenodd" stroke="#626262" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 6.5h12"/><path d="M4.498 10.5h11.997"/><path d="M4.5 14.5h11.995"/></g>
				</svg>
			</button>

			{{-- Navigation: mobile --}}
			<nav 
				class="header__burger" 
				:class="{'show': showBurgerMenu}"
			>
				<button class="header__burger--close" type="button" x-on:click="showBurgerMenu = false">
					<svg>
						<use xlink:href="/sprite.svg#x"></use>
					</svg>
				</button>

				@include('includes.main.partials.header.nav-menu')
			</nav>

			{{-- Language switcher --}}
			@include('includes.main.partials.header.lang-switcher')
		</div>
	</div>
</header>