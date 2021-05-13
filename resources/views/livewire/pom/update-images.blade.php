<div class="flex flex-col mt-10" x-show="activeTab == 'images'">
	<form class="mb-5" x-data="{ showSuccess:true }" wire:submit.prevent="updateImages">
		@if (count($images) > 0)
			<button class="py-3 px-5 flex items-center mb-5 shadow rounded bg-green-500 text-white hover:bg-green-600 transition" type="submit" wire:click.prevent="updateImages">
				{{ __('Save') }}

				<div wire:loading wire:target="updateImages">
					@include('includes.common.spinner')
				</div>
			</button>

			<div class="p-3 bg-slightly-lighter grid gap-5 grid-cols-4">
				@if ($images)
					@foreach($images as $img)
						<div wire:key="{{ $loop->index }}" class="flex flex-col w-52 h-full">
							<img class="w-full h-full object-center object-cover rounded-sm" src="{{ $img->temporaryUrl() }}">
							
							<div class="flex items-center justify-end p-3 bg-dark-secondary">
								<button type="button" wire:click="cancelImage({{ $loop->index }})" class="text-red-400 hover:text-red-300 underline">
									{{ __('Cancel Image') }}
								</button>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		@else
			<button class="py-3 px-5 rounded shadow font-medium bg-green-600 hover:bg-green-700 text-white transition" type="button" x-on:click="if($refs.imagesInput) $refs.imagesInput.click()">
				Upload new Images
			</button>
		@endif

		@if ($success) 
			<div class="flex items-center justify-between p-3 rounded shadow my-5 bg-green-200" x-show.transition.duration.500ms="showSuccess">
				<span class="text-green-700 font-medium">
					{{ $success }}
				</span>

				<button type="button" x-on:click.prevent="showSuccess = false">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>
			</div> 
		@endif

		<input 
			class="hidden" 
			type="file" 
			multiple 
			x-ref="imagesInput"
			wire:model="images"
		>
	</form>

	<div class="grid gap-5 grid-cols-4">
		@foreach($pom->images as $image)
			<div class="flex flex-col group rounded shadow border overflow-hidden {{ $image->is_avatar ? 'border-blue-400' : 'border-gray-700' }}">
				<img 
					src="{{ '/storage/images/'.$pom->id.'/'.$image->url}}" 
					alt="Bubbles of Champain | 	Pomeranian Spitz | Померанский шпиц | {{ $pom->name }}" 
					class="w-full h-full object-center object-cover {{ ($image->is_avatar === 1) ? 'avatar' : '' }}"
				>
				<div class="flex items-center justify-between	 p-3 bg-dark-secondary">
					<button type="button" wire:click="removeExistingImage({{ $image->id }})" class="text-red-400 hover:text-red-300 underline">
						{{ __('Delete') }}
					</button>

					@if (!$image->is_avatar)
						<button type="button" wire:click="makeAvatar({{ $image->id }})" class="text-blue-400 hover:text-blue-300 underline">
							{{ __('Make avatar') }}
						</button>
					@endif 
				</div>
			</div>
		@endforeach
	</div>

</div>