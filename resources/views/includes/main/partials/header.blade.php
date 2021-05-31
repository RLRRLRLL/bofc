<header id="header" class="header" x-data="{ showBurgerMenu: false }">
	<div class="container p-5 header__inner h-full">
		{{-- Burger icon --}}
		<button 
			class="header__burger pointer-events-auto focus:ring-0" 
			data-magnetic
			type="button" 
			x-on:click="showBurgerMenu = !showBurgerMenu" 
			:class="showBurgerMenu ? 'toggled' : ''"
		>
			<ul class="buns">
				<li></li>
				<li></li>
			</ul>
		</button>

		<button type="button" id="runTransition" class="pointer-events-auto ml-5 px-4 py-2 bg-blue-400 text-gray-700 rounded shadow text-lg font-medium">
			RUN TRANSITION!!!
		</button>
	</div>
</header>