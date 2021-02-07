<div>
    <form wire:submit.prevent="storeImages">
		<div class="card">
			<div class="card-header">
				<h5>Images</h5>
			</div>
			<div class="card-body">
				<!-- -------------------------------------------- -->
				<div id="wireImages"
					 x-data="{ 
					 	isUploading: false,
					 	progress: 0,
					 	open: true
					 }"
					 x-on:livewire-upload-start="isUploading = true"
					 x-on:livewire-upload-finish="isUploading = false"
					 x-on:livewire-upload-error="isUploading = false"
					 x-on:livewire-upload-progress="progress = $event.detail.progress"
				>
					<div class="upload-imgs">

						<input 
							type="file" 
							wire:model="images" 
							multiple
							x-ref="fileInput"
							class="d-none"
						>

						<button class="upload-imgs__cta" 
							href="#"
							x-on:click.prevent="$refs.fileInput.click()">
							Upload images
						</button>

						@error('images.*')
							<div class="upload-imgs__alert-item">
								<span class="alert alert-danger"
										x-show="open">
									{{ $message }}
									<a href="#" 
										class="alert-close"
										x-on:click.prevent="open = false">
										<i class="fas fa-times"></i>	
									</a>
								</span>
							</div>
						@enderror
						
						<div class="upload-imgs__cont {{ $images ? '' : 'hide' }}">
							@if ($images)
								@foreach($images as $img)
									<div wire:key="{{ $loop->index }}"
										class="upload-imgs__item"
									>
										<img class="upload-imgs__item--img" 
											src="{{ $img->temporaryUrl() }}">
										
										<a 	class="upload-imgs__item--cancel"
											wire:click.prevent="cancelImage({{ $loop->index }})"
											href="#" 
										>
											<i class="fas fa-times"></i>
										</a>
									</div>
								@endforeach
							@endif
						</div>

					</div>
					
					<div x-show="isUploading">
						<progress max="100" x-bind:value="progress"></progress>
					</div>
				</div>
				<!-- -------------------------------------- -->
				<button id="submitImagesBtn"
						type="submit"
						wire:click.prevent="storeImages"
						class="submit-btn submit-btn__images mt-3 w-5">
					Save
					<i class="fas fa-check"></i>
				</button>
			</div>
		</div>
	</form>
</div>
