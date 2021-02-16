<div>
	<div x-data="{showAlert:true}" x-cloak class="settings__alerts-container">
		<div class="success-wrapper">
			@if ($success) 
				<div class="alert alert-main success" x-show.transition.duration.500ms="showAlert">
					<span>{{ $success }}</span>
					<a href="#" x-on:click.prevent="showAlert = false">
						&#10005;
					</a>
				</div> 
			@endif
		</div>
		
		<div class="error-wrapper">
			@error('owner') 
				<div class="alert alert-main error" x-show.transition.duration.500ms="showAlert">
					<span>{{ $message }}</span>
					<a href="#" x-on:click.prevent="showAlert = false">
						&#10005;
					</a>
				</div> 
			@enderror

			@error('breeder') 
				<div class="alert alert-main error" x-show.transition.duration.500ms="showAlert">
					<span>{{ $message }}</span>
					<a href="#" x-on:click.prevent="showAlert = false">
						&#10005;
					</a>
				</div> 
			@enderror
		</div>
	</div>

	<div class="settings__index">
		<div class="settings__index--list">
			<ul>
				<div class="form-group">
					<input wire:model="breeder" class="form-control">
					<button type="submit" wire:click.prevent="store('breeder')" class="btn btn-success">Add new breeder</button>
				</div>

				<hr>

				<h3>Breeders</h3>
				
				@if($breeders)
					@foreach($breeders as $breeder)
						<li>
							{{ $breeder->breeder }}
							<button type="button" wire:click="destroy('breeder', {{ $breeder->id }})">
								Delete
							</button>
						</li>
					@endforeach
				@endif
			</ul>

			<ul>
				<div class="form-group">
					<input wire:model="owner" class="form-control">
					<button type="submit" wire:click.prevent="store('owner')" class="btn btn-success">Add new owner</button>
				</div>

				<hr>

				<h3>Owners</h3>
				
				@if($owners)
					@foreach($owners as $owner)
						<li>
							{{ $owner->owner }}
							<button type="button" wire:click="destroy('owner', {{ $owner->id }})">
								Delete
							</button>
						</li>
					@endforeach
				@endif
			</ul>
		</div>
	</div>
</div>
