<div class="py-5 border-b border-gray-700" x-show="showFilters">
	<section class="bg-dark-secondary rounded shadow">
		{{-- Filter item --}}
		<div class="w-full border-b border-gray-900" x-data="{ open: false }">
			<button 
				type="button"
				class="w-full flex items-center justify-between py-2 px-4 text-gray-300 transition font-medium" 
				@click="open = !open" 
				:class="{'bg-slightly-lighter text-white': open}"
			>
				<span>
					{{ __('Gender') }}
				</span>

				<svg class="h-5 w-5 ml-2 transform transition" :class="{'rotate-180': !open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
				</svg>
			</button>

			<div class="p-4 space-y-2" x-show="open">
				<div>
					<input class="radio-rounded" type="radio" id="all" wire:model="pomGender" value="all" checked>
					<label for="all" class="text-gray-100">
						{{ __('All') }}
					</label>
				</div>

				<div>
					<input class="radio-rounded" type="radio" id="male" wire:model="pomGender" value="1">
					<label for="male" class="text-gray-100">
						{{ __('Male') }}
					</label>
				</div>

				<div>
					<input class="radio-rounded" type="radio" id="female" wire:model="pomGender" value="0">
					<label for="female" class="text-gray-100">
						{{ __('Female') }}
					</label>
				</div>
			</div>
		</div>

		{{-- Filter item --}}
		<div class="w-full border-b border-gray-900" x-data="{ open: false }">
			<button 
				type="button"
				class="w-full flex items-center justify-between py-2 px-4 text-gray-300 transition font-medium" 
				@click="open = !open" 
				:class="{'bg-slightly-lighter text-white': open}"
			>
				<span>
					{{ __('Age') }}
				</span>

				<svg class="h-5 w-5 ml-2 transform transition" :class="{'rotate-180': !open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
				</svg>
			</button>

			<div class="p-4 space-y-2" x-show="open">
				<div>
					<input class="checkbox-squared" type="checkbox" id="puppy" wire:model="pomAges" value="puppy">
					<label for="puppy" class="text-gray-100">
						{{ __('Puppy') }}
					</label>
				</div>

				<div>
					<input class="checkbox-squared" type="checkbox" id="adult" wire:model="pomAges" value="adult">
					<label for="adult" class="text-gray-100">
						{{ __('Adult') }}
					</label>
				</div>

				<div>
					<input class="checkbox-squared" type="checkbox" id="senior" wire:model="pomAges" value="senior">
					<label for="senior" class="text-gray-100">
						{{ __('Senior') }}
					</label>
				</div>
			</div>
		</div>

		{{-- Filter item --}}
		<div class="w-full" x-data="{ open: false }">
			<button 
				type="button"
				class="w-full flex items-center justify-between py-2 px-4 text-gray-300 transition font-medium" 
				@click="open = !open" 
				:class="{'bg-slightly-lighter text-white': open}"
			>
				<span>
					{{ __('Other') }}
				</span>

				<svg class="h-5 w-5 ml-2 transform transition" :class="{'rotate-180': !open}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
				</svg>
			</button>

			<div class="p-4 space-y-2" x-show="open">
				<div>
					<input class="checkbox-squared" type="checkbox" id="for_sale" wire:model="pomForSale" checked="checked">
					<label for="for_sale" class="text-gray-100">
						{{ __('For sale') }}
					</label>
				</div>

				<div>
					<input class="checkbox-squared" type="checkbox" id="open_for_breeding" wire:model="pomIsOpen">
					<label for="open_for_breeding" class="text-gray-100">
						{{ __('Breeding') }}
					</label>
				</div>

				<div>
					<input class="checkbox-squared" type="checkbox" id="has_titles" wire:model="pomHasTitles">
					<label for="has_titles" class="text-gray-100">
						{{ __('Has titles') }}
					</label>
				</div>
			</div>
		</div>
	</section>
</div>
