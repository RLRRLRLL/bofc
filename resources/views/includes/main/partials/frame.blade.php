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
	</div>
</header>