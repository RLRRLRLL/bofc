<div>
    <form wire:submit.prevent="sendMessage">
    	@csrf

		<div class="form-item">
			<label for="name"><span>*&nbsp;</span>Name:</label>
			<input id="name" type="text" wire:model="name" required placeholder="Your name">
			<div x-data="{ displayError:false }" x-on:error-ocured.window="displayError = true; setTimeout(() => displayError = false, 3500)" x-show.transition.duration.250ms="displayError" class="wire-error">
				@error('name') <p class="wire-error__text">{{ $message }}</p> @enderror
			</div>
		</div>
		
		<div class="form-item">
			<label for="email"><span>*&nbsp;</span>E-mail:</label>
			<input id="email" type="text" wire:model="email" placeholder="Valid e-mail address" required>
			<div x-data="{ displayError:false }" x-on:error-ocured.window="displayError = true; setTimeout(() => displayError = false, 3500)" x-show.transition.duration.250ms="displayError" class="wire-error">
				@error('email') <p class="wire-error__text">{{ $message }}</p> @enderror
			</div>
		</div>
		
		<div class="form-item">
			<label for="text"><span>*&nbsp;</span>Message:</label>
			<textarea id="text" type="text" wire:model="text" placeholder="Your message" required></textarea>
			<div x-data="{ displayError:false }" x-on:error-ocured.window="displayError = true; setTimeout(() => displayError = false, 3500)" x-show.transition.duration.250ms="displayError" class="wire-error">
				@error('text') <p class="wire-error__text">{{ $message }}</p> @enderror
			</div>
		</div>
    	
    	
    	<button type="submit" wire:click.prevent="sendMessage">
    		Submit

			<div wire:loading wire:target="sendMessage">
				@include('includes.common.spinner')
			</div>
    	</button>
    </form>
</div>
