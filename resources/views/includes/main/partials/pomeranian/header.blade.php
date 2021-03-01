<section class="poms__header anim-item fadeInUp anim-delay" data-scroll data-scroll-class="anim-stop">
	<h1 class="poms__header--title">
		{{ __('Find yourself a best friend.') }}
	</h1>
	<div class="poms__header--view">
		<div class="option__btn option--grid "
			:class="{'selected': gridViewActive}"
			x-on:click="gridViewActive = true; listViewActive = false">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span>Grid</span>
		</div>
		<div class="option__btn option--list"
			:class="{'selected': listViewActive}"
			x-on:click="gridViewActive = false; listViewActive = true">
			<span></span>
			<span></span>
			<span></span>
			<span>List</span>
		</div>
	</div>
</section>