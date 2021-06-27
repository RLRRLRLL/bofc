<div x-data="{ open: false, selected: '' }" {{ $attributes->merge(['class' => 'space-y-2']) }}>
	<label>
		{{ $label }}
	</label>
	
	<div class="relative ">
		<button
			type="button"
			class="relative w-full flex items-center justify-between p-2 rounded shadow transition duration-75 hover:text-white hover:bg-slightly-lighter border focus:ring-0"
			x-on:click.prevent="open = !open"
			:class="
				open ? 
				'border-gray-600 text-white bg-slightly-lighter' :
				'border-gray-700 text-gray-200 bg-dark-secondary'
			"
		>
			<span x-text="selected || '--- Select ---'"></span>

			<svg class="select__button--arr w-5 h-5 fill-current" viewBox="0 0 32 32">
				<path d="M16 28l-7-7l1.41-1.41L16 25.17l5.59-5.58L23 21l-7 7z"/>
				<path d="M16 4l7 7l-1.41 1.41L16 6.83l-5.59 5.58L9 11l7-7z"/>
			</svg>
		</button>

		<ul class="absolute top-full w-full flex flex-col mt-2 z-50 rounded shadow bg-gray-900" x-show="open" x-on:click.away="open = false">
			{{ $iteration }}
		</ul>
	</div>
</div>
