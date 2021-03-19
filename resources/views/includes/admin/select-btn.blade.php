<button class="select__button" x-on:click.prevent="expandList =! expandList" :class="{'active': expandList === true}">
	<span class="select__button--txt" x-text="selected || '--- Select ---'"></span>
	<svg class="select__button--arr">
		<use xlink:href="/sprite.svg#arrow"></use>
	</svg>
</button>