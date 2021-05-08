<div id="lang_switcher" class="lang" x-data="{ showDrop: false, result: '{{ app()->getLocale() }}'.toUpperCase() }">
	<button 
		class="lang-result" 
		:class="{'active': showDrop}"
		type="button" 
		@click.prevent="showDrop = !showDrop"
	>
		<span class="lang-result__text" x-text="result.toUpperCase()"></span>
		<svg class="lang-result__svg">
			<use xlink:href="/sprite.svg#arrow"></use>
		</svg>
	</button>
	<ul class="lang-drop" x-show.transition.duration.250ms="showDrop" x-on:click.away="showDrop = false">
		@foreach($langs as $lang)
			<li class="lang-drop__item" :class="{'active': result === '{{ $lang }}'.toUpperCase()}">
				<a 
					class="lang-link leave-page"
					href="{{'/change-language/'.$lang }}" 
					x-on:click="result = '{{ $lang }}'; showDrop = false"
					x-text="'{{ $lang }}'.toUpperCase()"
				>
				</a>
			</li>
		@endforeach
	</ul>
</div>