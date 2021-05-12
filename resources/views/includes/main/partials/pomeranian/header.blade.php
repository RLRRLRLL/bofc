<section class="poms__header w-full">
	<div class="poms__header--inner grid grid-cols-1">
		<h1 class="leftonade md:manege text-3xl text-center tracking-wide text-blue-100 pb-3 border-b border-gray-700">
			{{ __('Find yourself a best friend.') }}
		</h1>
		
		<div class="w-full flex items-start justify-between mt-5 pb-3 border-b border-gray-700">
			{{-- Filters --}}
			<button type="button" class="py-1 px-2 rounded text-gray-400 active:bg-dark-secondary focus:bg-dark-secondary active:text-gray-200">
				<svg class="w-8 h-8 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M28 6H4m24 10H4m24 10H4M24 3v6M8 13v6m12 4v6"/></g></svg>

				<span class="inline-block mt-px text-xs font-medium">
					{{ __('Filters') }}
				</span>
			</button>

			{{-- Change view --}}
			<div class="flex items-center">
				<div class="option__btn option--grid" :class="{'selected': gridViewActive}" x-on:click="gridViewActive = true; listViewActive = false">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span>Grid</span>
				</div>
				<div class="option__btn option--list" :class="{'selected': listViewActive}" x-on:click="gridViewActive = false; listViewActive = true">
					<span></span>
					<span></span>
					<span></span>
					<span>List</span>
				</div>
			</div>
		</div>
	</div>
</section>