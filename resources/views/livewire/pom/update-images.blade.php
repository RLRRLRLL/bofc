<div class="gallery" x-show.transition.in.duration.350ms="activeTab == 'images'">
	
	<div class="gallery__upload" x-data="{showSuccess:true}">
		<form wire:submit.prevent="updateImages">
			@if (count($images) > 0)
				<button type="submit" wire:click.prevent="updateImages">
					Save
					<div wire:loading wire:target="updateImages">
						@include('includes.common.spinner')
					</div>
				</button>

				<div class="images-cont">
					@if ($images)
						@foreach($images as $img)
							<div wire:key="{{ $loop->index }}" class="images-cont__item">
								<img class="upload-imgs__item--img" 
									src="{{ $img->temporaryUrl() }}">
								
								<button wire:click.prevent="cancelImage({{ $loop->index }})">
									&#10005;
								</button>
							</div>
						@endforeach
					@endif
				</div>
			@else
				<a href="#" x-on:click.prevent="if($refs.imagesInput) $refs.imagesInput.click()">
					Upload new Images
				</a>
			@endif

			@if ($success) 
				<div class="alert alert-main success" x-show.transition.duration.500ms="showSuccess">
					<span>{{ $success }}</span>
					<a href="#" x-on:click.prevent="showSuccess = false">
						&#10005;
					</a>
				</div> 
			@endif

			<input 
				class="d-none" 
				type="file" 
				multiple 
				x-ref="imagesInput"
				wire:model="images"
			>
			
		</form>
	</div>

	<div class="gallery__grid">
		@foreach($pom->images as $image)
			<div wire:click="makeAvatar({{ $image->id }})">
				<img src="{{ '/storage/images/'.$pom->id.'/'.$image->url}}" alt="Bubbles of Champain | 		Pomeranian Spitz | Померанский шпиц | {{ $pom->name }}" class="{{ ($image->is_avatar === 1) ? 'avatar' : '' }}">
				<button type="button" wire:click.prevent="removeExistingImage({{ $image->id }})">
					&#10005;
				</button>
			</div>
		@endforeach
	</div>

</div>