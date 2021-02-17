<div class="person">

	<div 
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
	</div>

	<form wire:submit.prevet="createPerson" class="person-form">
		@csrf

		<div class="form-group person-form__radio">
			<label>Type: <span>{{ $type == 'breeder' ? 'Breeder' : 'Owner' }}</span></label>

			<div>
				<div class="form-check">
					<input  id="breeder"
							checked
							wire:model="type"
							class="form-check-input"
							type="radio"
							value="breeder" >
					<label class="form-check-label" for="breeder">
						Breeder
					</label>
				</div>

				<div class="form-check">
					<input  id="owner"
							wire:model="type"
							class="form-check-input" 
							type="radio"
							value="owner">
					<label class="form-check-label" for="owner">
						Owner
					</label>
				</div>
			</div>

			@error('type')
				<p class="text-danger">{{ $message }}</p>
			@enderror
		</div>

		<div class="form-group person-form__input">
			<label> Name: <span>{{ $name }}</span> </label>
			<input wire:model.debounce.400ms="name" class="form-control">
			@error('name') <p class="text-danger">{{ $message }}</p> @enderror
		</div>

		<button class="person-form__button" type="submit" wire:click.prevent="createPerson">Create</button>
	</form>

	<div class="person-list">
		<ul>
			<h3>Breeders</h3>
			@if($breeders)
				@foreach($breeders as $breeder)
					<li>
						{{ $breeder->name }}
						<button wire:click.prevent="destroy({{ $breeder->id }})">
							Delete
						</button>
					</li>
				@endforeach
			@else
				<p>No breeders yet.</p>
			@endif
		</ul>

		<ul>
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
		</ul>
	</div>
	
    {{-- <div class="bo-wrapper">
		<div class="form-group">
			<input wire:model="breeder_name" class="form-control">
			<button type="submit" class="btn btn-success" wire:click.prevent="createB">Add new breeder</button>
			@error('name') <span class="text-danger">{{ $message }}</span> @enderror
		</div>

		<div class="form-group">
			<input wire:model="owner_name" class="form-control">
			<button type="submit" wire:click.prevent="createO" class="btn btn-success">Add new owner</button>
			@error('name') <span class="text-danger">{{ $message }}</span> @enderror
		</div>
		
		<div x-data="{showAlert:true}" x-cloak class="alerts-container">
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
				<h3>Breeders</h3>
				
				@if($breeders)
					@foreach($breeders as $breeder)
						<li>
							{{ $breeder->name }}
							<button type="button" wire:click="destroy('breeder', {{ $breeder->id }})">
								Delete
							</button>
						</li>
					@endforeach
				@endif
			</ul>

			<ul>
				<h3>Owners</h3>
				
				@if($owners)
					@foreach($owners as $owner)
						<li>
							{{ $owner->name }}
							<button type="button" wire:click="destroy('owner', {{ $owner->id }})">
								Delete
							</button>
						</li>
					@endforeach
				@endif
			</ul>
		</div>
	</div> --}}
</div>
