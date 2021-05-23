@section('page_title', __('People'))

<div>
    <x-admin.page-layout :title="__('People')">
		<div class="space-y-10">
			{{-- Create breeders / owners --}}
			<div>
				<h3 class="mb-2 text-gray-300 text-xl">
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
						<div class="flex flex-col space-y-2 pb-5">
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
			<div>
				<h3 class="mb-2 text-gray-300 text-xl">
					{{ __('All') }}
				</h3>

				<div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10 p-5 border border-gray-600 rounded-md shadow-sm bg-slightly-lighter">
					{{-- Breeders --}}
					<div>
						<h4 class="text-amber mb-2 text-xl">
							{{ __('Breeders') }}
						</h4>

						<ul class="space-y-2">
							@forelse ($breeders as $breeder)
								<li>
									<div class="flex items-center justify-between py-2 px-3 rounded bg-admin-secondary">
										<span class="text-gray-200 text-lg">
											{{ $breeder->name }}
										</span>

										<button class="py-1 px-3 rounded shadow bg-red-500 bg-opacity-90 text-white hover:bg-red-600" wire:click.prevent="destroy({{ $breeder }})">
											{{ __('Delete') }}
										</button>
									</div>
								</li>
							@empty
								<li>
									<div class="flex items-center justify-between py-2 px-3 rounded bg-admin-secondary">
										<span class="text-gray-400">
											{{ __('No breeders yet.') }}
										</span>
									</div>
								</li>
							@endforelse
						</ul>
					</div>

					{{-- Owners --}}
					<div>
						<h4 class="text-amber mb-2 text-xl">
							{{ __('Owners') }}
						</h4>

						<ul class="space-y-2">
							@forelse ($owners as $owner)
								<li>
									<div class="flex items-center justify-between py-2 px-3 rounded bg-admin-secondary">
										<span class="text-gray-200 text-lg">
											{{ $owner->name }}
										</span>

										<button class="py-1 px-3 rounded shadow bg-red-500 bg-opacity-90 text-white hover:bg-red-600" wire:click.prevent="destroy({{ $owner }})">
											{{ __('Delete') }}
										</button>
									</div>
								</li>
							@empty
								<li>
									<div class="flex items-center justify-between py-2 px-3 rounded bg-admin-secondary">
										<span class="text-gray-400">
											{{ __('No owners yet.') }}
										</span>
									</div>
								</li>
							@endforelse
						</ul>
					</div>
				</div>
			</div>
		</div>
	</x-admin.page-layout>
</div>
