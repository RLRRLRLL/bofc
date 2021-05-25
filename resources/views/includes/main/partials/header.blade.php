<header x-data="{ showBurgerMenu: false }" class="relative w-full z-50 overflow-hidden shadow-md py-3 lg:py-5 bg-dark-secondary">
	<div class="container flex flex-col">
		<div class="flex items-center justify-end">
			{{-- App logo --}}
			<img src="{{ asset('images/transparent/logo-circle.png') }}" class="w-60 md:w-96 | absolute left-1 top-1 md:-left-10 md:-top-24 lg:hidden | object-center object-contain opacity-20" alt="" style="z-index: -1;">

			{{-- Navigation: desktop --}}
			<nav class="hidden md:flex">
				@include('includes.main.partials.header.nav-menu', [
					'classes' => 'flex items-center justify-items-end',
					'link' => 'px-4 py-2 text-xl leftonade tracking-wide',
					'cta' => 'mx-5 px-5 py-3 tracking-wide shadow-lg'
				])
			</nav>

			{{-- Language switcher --}}
			@include('includes.main.partials.header.lang-switcher')

			{{-- Btn burger --}}
			<button type="button" class="md:hidden p-1 rounded text-amber focus:text-white focus:bg-slightly-lighter active:bg-slightly-lighter active:text-white transition duration-100" x-on:click="showBurgerMenu = !showBurgerMenu">
				{{-- burger icon --}}
				<template x-if="showBurgerMenu">
					<svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</template>
				{{-- close menu icon --}}
				<template x-if="!showBurgerMenu">
					<svg class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
					</svg>
				</template>
			</button>
		</div>

		{{-- Burger menu --}}
		<nav class="md:hidden py-10" x-show="showBurgerMenu">
			@include('includes.main.partials.header.nav-menu', [
				'classes' => 'flex flex-col space-y-5',
				'link' => 'leftonade text-2xl text-amber',
				'cta' => 'mt-3 px-5 py-3 tracking-wide'
			])
		</nav>
	</div>
</header>