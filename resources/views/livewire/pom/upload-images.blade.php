<div class="space-y-5">
	<h1 class="text-3xl text-gray-300 font-medium">
		{{ __('Images') }}
	</h1>

    <form class="p-5 bg-admin-secondary rounded shadow transition" wire:submit.prevent="storeImages" wire:loading.class="opacity-50" wire:target="storeImages">
		<div class="flex flex-col" id="wireImages" x-data="{ isUploading: false, open: true }">
			<div class="pb-5 border-b border-gray-600 | flex flex-col">
				<input 
					type="file" 
					wire:model="images" 
					multiple
					x-ref="fileInput"
					class="hidden"
				>

				<button class="py-3 px-5 rounded shadow font-medium bg-amber text-dark transition" type="button" x-on:click="$refs.fileInput.click()">
					{{ __('Upload images') }}
				</button>

				@error('images.*')
					<div class="upload-imgs__alert-item">
						<span class="alert alert-danger"
								x-show="open">
							{{ $message }}
							<button class="alert-close"
								type="button"
								x-on:click="open = false">
								<i class="fas fa-times"></i>	
							</button>
						</span>
					</div>
				@enderror
				
				@if ($images)
					<div class="pt-5 border-t border-gray-600 | grid gap-5 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
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
					</div>
				@endif

			</div>
			
			{{-- Submit --}}
			<div class="pt-5 ">
				<button type="submit" class="w-full flex items-center justify-center py-4 px-4 bg-green-600 hover:bg-green-700 text-lg text-white font-medium rounded shadow focus:ring-0" wire:click.prevent="storeImages" >
					{{ __('Next') }}
				</button>
			</div>
		</div>
	</form>
</div>
