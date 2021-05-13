@php
	// repeating label and value classes
	$label = 'text-gray-400 text-lg';
	$value = 'inline-block ml-1 text-amber text-lg';
	$text_input = 'bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0';
@endphp

<div class="space-y-5">
	<h1 class="text-3xl text-gray-300 font-medium">
		{{ __('Info') }}
	</h1>
	
	<form id="addPomForm" class="p-5 bg-admin-secondary rounded shadow transition" wire:submit.prevent="saveInfo" wire:loading.class="opacity-50" wire:target="saveInfo">
		@csrf
		
		<div class="p-5">
			<div class="flex flex-col">
				<!-- Info fill-up -->
				<div class="pb-5 border-b border-gray-600 | grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
					@foreach ($base_info as $item)
						<div class="flex flex-col p-2 space-y-2">
							<label>
								<span class="{{ $label }}">{{ ucfirst($item) }}: </span>
								<span class="{{ $value }}">{{ $this->$item }}</span>
							</label>
							<input wire:model.debounce.400ms="{{ $item }}" type="text" class="{{ $text_input }}">
							@error($item) <p class="text-red-500">{{ $message }}</p> @enderror
						</div>
					@endforeach

					<div class="flex flex-col p-2 space-y-2">
						<label>
							<span class="{{ $label }}">Birthday: </span>
							<span class="{{ $value }}">{{ $birthday }}</span>
						</label>
						<input wire:model.debounce.400ms="birthday" id="datepicker" class="{{ $text_input }}">
						@error('birthday') <p class="text-red-500">{{ $message }}</p> @enderror
					</div>
				</div>

				<!-- Alerts -->
				<div class="flex items-center justify-between p-3 rounded shadow my-5 bg-red-200" x-cloak x-data="{ showAlert: false, message: '' }" x-on:denied.window="showAlert = true; setTimeout(() => showAlert = false, 3500); message = $event.detail.message" x-show.transition.duration.500ms="showAlert">
					<span class="text-red-700 font-medium" x-text="message"></span>
	
					<button type="button" x-on:click="showAlert = false">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
						</svg>
					</button>
				</div> 

				<!-- Selects -->
				<div class="py-5 border-b border-gray-600 | grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
					<x-admin.forms.select-dropdown>
						<x-slot name="label">
							<span class="{{ $label }}">Owner:</span> 
							<span class="{{ $value }}" x-text="selected"></span>
						</x-slot>

						<x-slot name="iteration">
							<li x-on:click="open = false; selected = ''" wire:click="$set('owner', null)" class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100">
								Select later
							</li>

							@if($people)
								@foreach($people->where('type', 0) as $owner)
									<li class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100" x-on:click="open = false; selected = '{{ $owner->name }}'" wire:click="attach('owner', {{ $owner->id }})">
										{{ $owner->name }}
									</li>
								@endforeach	
							@endif
						</x-slot>
					</x-admin.forms.select-dropdown>

					<x-admin.forms.select-dropdown>
						<x-slot name="label">
							<span class="{{ $label }}">Breeder:</span> 
							<span class="{{ $value }}" x-text="selected"></span>
						</x-slot>

						<x-slot name="iteration">
							<li x-on:click="open = false; selected = ''" wire:click="$set('breeder', null)" class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100">
								Select later
							</li>

							@if($people)
								@foreach($people->where('type', 1) as $breeder)
									<li class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100" x-on:click="open = false; selected = '{{ $breeder->name }}'" wire:click="attach('breeder', {{ $breeder->id }})">
										{{ $breeder->name }}
									</li>
								@endforeach	
							@endif
						</x-slot>
					</x-admin.forms.select-dropdown>

					<x-admin.forms.select-dropdown>
						<x-slot name="label">
							<span class="{{ $label }}">Father:</span> 
							<span class="{{ $value }}" x-text="selected"></span>
						</x-slot>

						<x-slot name="iteration">
							<li x-on:click="open = false; selected = ''" wire:click="$set('father', null)" class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100">
								Select later
							</li>

							@if($people)
								@foreach($poms->where('is_male', 1) as $male)
									<li class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100" x-on:click="open = false; selected = '{{ $male->name }}'" wire:click="attach('father', {{ $male->id }})">
										{{ $male->name }}
									</li>
								@endforeach	
							@endif
						</x-slot>
					</x-admin.forms.select-dropdown>
					
					<x-admin.forms.select-dropdown>
						<x-slot name="label">
							<span class="{{ $label }}">Mother:</span> 
							<span class="{{ $value }}" x-text="selected"></span>
						</x-slot>

						<x-slot name="iteration">
							<li x-on:click="open = false; selected = ''" wire:click="$set('mother', null)" class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100">
								Select later
							</li>

							@if($people)
								@foreach($poms->where('is_male', 0) as $female)
									<li class="py-2 px-3 text-gray-300 cursor-pointer hover:bg-slightly-lighter hover:text-gray-100" x-on:click="open = false; selected = '{{ $female->name }}'" wire:click="attach('mother', {{ $female->id }})">
										{{ $female->name }}
									</li>
								@endforeach	
							@endif
						</x-slot>
					</x-admin.forms.select-dropdown>
				</div>

				<!-- Checkboxes & Radios { car } -->
				<div class="py-5 border-b border-gray-600 | grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
					<div class="">
						<label class="{{ $label }} inline-block mb-1.5">
							{{ __('Age') }}:
						</label>

						<div class="flex items-center space-x-1.5">
							<input  id="puppy"
									value="puppy"
									wire:model="age"
									type="radio" 
									class="mb-px focus:ring-0 focus:outline-none"
									checked>

							<label for="puppy" class="text-gray-100">
								Puppy
							</label>
						</div>

						<div class="flex items-center space-x-1.5">
							<input  id="adult"
									value="adult"
									wire:model="age"
									type="radio" 
									class="mb-px focus:ring-0 focus:outline-none">

							<label for="adult" class="text-gray-100">
								Adult
							</label>
						</div>

						<div class="flex items-center space-x-1.5">
							<input  id="senior"
									value="senior"
									wire:model="age"
									type="radio" 
									class="mb-px focus:ring-0 focus:outline-none">

							<label for="senior" class="text-gray-100">
								Senior
							</label>
						</div>
					</div>

					<div class="">
						<label class="{{ $label }} inline-block mb-1.5">
							{{ __('Gender') }}:
						</label>

						<div class="flex items-center space-x-1.5">
							<input  id="male"
									wire:model="is_male"
									class="mb-px focus:ring-0 focus:outline-none"
									type="radio"
									value="male" >
							<label class="text-gray-100" for="male">
								Male
							</label>
						</div>

						<div class="flex items-center space-x-1.5">
							<input  id="female"
									checked
									wire:model="is_male"
									class="mb-px focus:ring-0 focus:outline-none" 
									type="radio"
									value="female">
							<label class="text-gray-100" for="female">
								Female
							</label>
						</div>

						@error('gender')
							<p class="text-red-500">{{ $message }}</p>
						@enderror
					</div>
					
					<div class="">
						<label class="{{ $label }} inline-block mb-1.5">
							{{ __('Other') }}:
						</label>
				
						<div class="flex items-center space-x-1.5">
							<input id="is_for_sale"
								wire:model.debounce.400ms="is_for_sale"
								name="is_for_sale"
								class="mb-px focus:ring-0 focus:outline-none"
								type="checkbox">
								
							<label for="is_for_sale" class="text-gray-100">
								For sale
							</label>
						</div>
				
						<div class="flex items-center space-x-1.5">
							<input id="has_fontanel"
								wire:model="has_fontanel"
								class="mb-px focus:ring-0 focus:outline-none"
								type="checkbox">
								
							<label for="has_fontanel" class="text-gray-100">
								Has fontanel
							</label>
						</div>
				
						<div class="flex items-center space-x-1.5">
							<input id="is_open_for_breeding"
								wire:model="is_open_for_breeding"
								class="mb-px focus:ring-0 focus:outline-none"
								type="checkbox">
								
							<label for="is_open_for_breeding" class="text-gray-100">
								Open for breeding
							</label>
						</div>
					</div>
				</div>

				<!-- Titles -->
				<div class="py-5 border-b border-gray-600 |">
					<div class="flex flex-col space-y-2">
						<label for="titles" class="{{ $label }}">
							Titles
						</label>

						<textarea wire:model="titles" id="titles" class="{{ $text_input }}"></textarea>

						@error('titles')
							<p class="text-red-500">{{ $message }}</p>
						@enderror
					</div>
				</div>
				
				{{-- Submit --}}
				<button type="submit" class="flex items-center justify-center py-4 px-4 bg-green-600 hover:bg-green-700 text-lg text-white font-medium rounded shadow focus:ring-0" wire:click.prevent="saveInfo" >
					{{ __('Next') }}
				</button>
			</div>
		</div>
	</form>
</div>