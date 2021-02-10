<div>
    <form 
		wire:submit.prevent="storeImages"
	>
		<div class="card">
			<div class="card-header">
				<h2>Images</h2>
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
							type="button"
							x-on:click="$refs.fileInput.click()">
							Upload images
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
						<progress max="100" x-bind:value="progress" style="width: 100%;"></progress>
					</div>
				</div>
				<!-- -------------------------------------- -->
				<button id="submitImagesBtn"
						type="submit"
						wire:click.prevent="storeImages"
						class="submit-btn submit-btn__images mt-3 w-5">
					Next
					<div wire:loading wire:target="storeImages">
						@include('includes.common.spinner')
					</div>
					<i class="fas fa-angle-double-right"></i>
				</button>
			</div>
		</div>
	</form>
</div>
