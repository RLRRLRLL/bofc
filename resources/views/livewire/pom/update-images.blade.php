<div class="single__right">
	
	<div class="single__right--upload">
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
				<a href="#" x-on:click.prevent="$refs.imagesInput.click()">
					Upload new Images
				</a>
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

	<div class="single__right--grid">
		@foreach($pom->images as $image)
			<div>
				<img src="{{ '/storage/images/'.$pom->id.'/'.$image->url}}" alt="Bubbles of Champain | 		Pomeranian Spitz | Померанский шпиц | {{ $pom->name }}" class="{{ ($image->is_avatar === 1) ? 'avatar' : '' }}">
				<button type="button" wire:click.prevent="removeExistingImage({{ $image->id }})">
					&#10005;
				</button>
			</div>
		@endforeach
	</div>

</div>