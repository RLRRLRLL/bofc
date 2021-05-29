<section class="poms__header w-full">
	<div class="poms__header--inner grid grid-cols-1 sm:flex sm:items-end sm:justify-between sm:pb-5 sm:border-b sm:border-gray-700">
		<h1 class="font-leftonade sm:font-manege text-3xl sm:text-5xl text-center sm:text-left tracking-wide text-blue-100 pb-3 border-b border-gray-700 sm:pb-0 sm:border-0 sm:mb-2">
			{{ __('Find yourself a best friend.') }}
		</h1>
		
		<div class="w-full sm:w-auto flex items-start justify-between sm:justify-end mt-5 pb-3 border-b border-gray-700 sm:pb-0 sm:border-0 sm:mt-0">
			{{-- Filters --}}
			<button type="button" class="py-1 px-2 sm:mr-3 rounded text-gray-400 active:bg-dark-secondary focus:bg-dark-secondary active:text-gray-200" x-on:click="showFilters = !showFilters">
				<svg class="w-8 h-8 sm:w-9 sm:h-9 stroke-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M28 6H4m24 10H4m24 10H4M24 3v6M8 13v6m12 4v6"/></g></svg>

				<span class="inline-block mt-px sm:mt-0 text-xs md:text-base font-medium">
					{{ __('Filters') }}
				</span>
			</button>

			{{-- Change view --}}
			<div class="flex items-center">
				<div class="view view-grid" title="{{ __('Switch to grid view') }}" :class="{'selected': gridViewActive}" x-on:click="gridViewActive = true; listViewActive = false">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span>
						{{ __('Grid') }}
					</span>
				</div>

				<div class="view view-list" title="{{ __('Switch to list view') }}" :class="{'selected': listViewActive}" x-on:click="gridViewActive = false; listViewActive = true">
					<span></span>
					<span></span>
					<span></span>
					<span>
						{{ __('List') }}
					</span>
				</div>
			</div>
		</div>

		@include('includes.main.partials.pomeranian.filter')
	</div>
</section>