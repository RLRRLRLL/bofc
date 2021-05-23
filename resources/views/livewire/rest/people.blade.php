@section('page_title', __('People'))

<div>
    <x-admin.page-layout :title="__('People')">
		<div class="space-y-5">
			{{-- Tip --}}
			{{-- <div class="w-full lg:w-auto inline-flex items-start p-3 rounded-md shadow-md bg-[#bbdefb] bg-opacity-30 text-gray-50">
				<svg class="h-5 w-5 lg:h-6 lg:w-6 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
				</svg>

				<p>
					{{ __('Here you can add breeders and owners so you can easily attach them to pomeranians later.') }}
				</p>
			</div> --}}

			
			{{-- <div 
				class="success-wrapper"
				x-cloak
				x-data="{ showAlert: false, message: '' }" 
				@person-updated.window="
					showAlert = true; 
					setTimeout(() => showAlert = false, 2500); 
					message = $event.detail.message
				"
			>
				<div class="alert alert-main success" x-show.transition.duration.500ms="showAlert">
					<span x-text="message"></span>
					<a href="#" x-on:click.prevent="showAlert = false">
						&#10005;
					</a>
				</div> 
			</div> --}}

			{{-- Create breeders / owners --}}
			<div>
				<h3 class="mb-3 text-gray-50 text-2xl font-light">
					{{ __('Create breeder / owner') }}
				</h3>

				<div class="w-full lg:w-2/4 p-5 border border-gray-600 rounded-md shadow-sm bg-slightly-lighter">
					<form 
						class="transition-all"
						wire:submit.prevent="createPerson" 
						wire:loading.class="opacity-50 pointer-events-none"
					>
						@csrf

						{{-- Select person type --}}
						<div class="flex flex-col space-y-1 pb-5">
							<label class="text-gray-400 text-lg">
								{{ __('Type') }}:
								<span class="text-amber">
									{{ $type == 'breeder' ? __('Breeder') : __('Owner') }}
								</span>
							</label>

							<div class="flex items-center space-x-3">
								<div class="inline-flex items-center space-x-1.5">
									<input  id="breeder"
											value="breeder"
											wire:model="type"
											type="radio" 
											class="mb-px focus:ring-0 focus:outline-none"
											checked>
		
									<label for="breeder" class="text-gray-100">
										{{ __('Breeder') }}
									</label>
								</div>

								<div class="inline-flex items-center space-x-1.5">
									<input  id="owner"
											value="owner"
											wire:model="type"
											type="radio" 
											class="mb-px focus:ring-0 focus:outline-none"
											checked>
		
									<label for="owner" class="text-gray-100">
										{{ __('Owner') }}
									</label>
								</div>
							</div>

							@error('type')
								<x-global.validation-error>
									{{ $message }}
								</x-global.validation-error>
							@enderror
						</div>

						{{-- Select name for person --}}
						<div class="flex flex-col space-y-1 py-4 border-b border-t border-gray-600">
							<label class="text-gray-400 text-lg">
								{{ __('Name') }}:
								<span class="text-amber">
									{{ $name }}
								</span>
							</label>

							<div>
								<input 
									type="text"
									class="bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0" 
									wire:model.debounce.400ms="name"
									required
								>
							</div>

							@error('name')
								<x-global.validation-error>
									{{ $message }}
								</x-global.validation-error>
							@enderror
						</div>

						<div class="pt-4">
							<button type="submit" wire:click.prevent="createPerson" class="py-2 px-5 flex items-center shadow rounded bg-green-600 text-white hover:bg-green-700 transition">
								{{ __('Create') }}
							</button>
						</div>
					</form>
				</div>
			</div>

			{{-- Show breeders / owners --}}
			<div class="mt-10">
				<h3 class="mb-3 text-gray-50 text-2xl font-light">
					{{ __('All') }}
				</h3>

				<div class="w-full p-5 border border-gray-600 rounded-md shadow-sm bg-slightly-lighter">
					<div>
						<h4 class="text-amber mb-3 text-xl">
							{{ __('Breeders') }}
						</h4>

						<ul class="space-y-2">
							@forelse ($breeders as $breeder)
								<li>
									{{ $breeder->name }}

									<button class="" wire:click.prevent="destroy({{ $breeder->id }})">
										{{ __('Delete') }}
									</button>
								</li>
							@empty
								<li>
									{{ __('No breeders yet.') }}
								</li>
							@endforelse
						</ul>
					</div>
				</div>

				{{-- <ul>
					<h3>Owners</h3>
					@if($owners)
						@foreach($owners as $owner)
							<li>
								{{ $owner->name }}
								<button wire:click.prevent="destroy({{ $owner->id }})">
									Delete
								</button>
							</li>
						@endforeach
					@else
						<p>No owners yet.</p>
					@endif
				</ul> --}}
			</div>
		</div>
	</x-admin.page-layout>
</div>
