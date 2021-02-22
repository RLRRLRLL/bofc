<div>
	<form id="addPomForm" wire:submit.prevent="saveInfo">
		@csrf
		
		<div>
			<div class="card">
				<div class="card-header">
					<h2>Info</h2>
				</div>
				<div class="card-body card-body__info">
					<!-- Info fill-up -->
					<div class="inputs info-item">
						
						@foreach ($base_info as $item)
							<div class="form-group form-over">
								<label> {{ ucfirst($item) }}: <span>{{ $this->$item }}</span> </label>
								<input wire:model.debounce.400ms="{{ $item }}" class="form-control">
								@error($item) <p class="text-danger">{{ $message }}</p> @enderror
							</div>
						@endforeach

						<div class="form-group form-over">
							<label> Birthday: <span>{{ $birthday }}</span> </label>
							<input wire:model.debounce.400ms="birthday" id="datepicker" class="form-control">
							@error('birthday') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

					</div>

					<!-- Alerts -->
					<div x-cloak x-data="{ showAlert: false, message: '' }" x-on:denied.window="showAlert = true; setTimeout(() => showAlert = false, 3500); message = $event.detail.message" class="w-100">
						<div class="alert alert-main error" x-show.transition.duration.500ms="showAlert">
							<span x-text="message"></span>
							<a href="#" x-on:click.prevent="showAlert = false">
								&#10005;
							</a>
						</div> 
					</div>

					<!-- Selects -->
					<div class="selects info-item">

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Owner: <span x-text="selected"></span>
							</label>

							<div class="select">
								@include('includes.admin.select-btn')

								<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" wire:click="$set('owner', null)">
										Select later
									</li>

									<!-- loop -->
									@if($people)
										@foreach($people->where('type', 0) as $owner)
											<li x-on:click="expandList = false; selected = '{{ $owner->name }}'" wire:click="attach('owner', {{ $owner->id }})">
												{{ $owner->name }}
											</li>
										@endforeach	
									@endif
								</ul>
							</div>
						</div>

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Breeder: <span x-text="selected"></span>
							</label>

							<div class="select">
								@include('includes.admin.select-btn')

								<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" wire:click="$set('breeder', null)">
										Select later
									</li>

									<!-- loop -->
									@if($people)
										@foreach($people->where('type', 1) as $breeder)
											<li x-on:click="expandList = false; selected = '{{ $breeder->name }}'" wire:click="attach('breeder', {{ $breeder->id }})">
												{{ $breeder->name }}
											</li>
										@endforeach	
									@endif
								</ul>
							</div>
						</div>
						
						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Father: <span x-text="selected"></span>
							</label>

							<div class="select">
								@include('includes.admin.select-btn')

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" 
										wire:click="$set('father', null)"
										class="fallback">
										Choose later
									</li>
									<!-- loop -->
									@if($poms)
										@foreach($poms->where('is_male', 1) as $male)
											<li 
												x-on:click="expandList = false; selected = '{{ $male->name }}'" 
												wire:click="attach('father', {{ $male->id }})"
											>
												{{ $male->name }}
											</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
						
						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Mother: <span x-text="selected"></span>
							</label>

							<div class="select">
								@include('includes.admin.select-btn')

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" 
										wire:click="$set('mother', null)"
										class="fallback">
										Choose later
									</li>
									<!-- loop -->
									@if($poms)
										@foreach($poms->where('is_male', 0) as $female)
											<li 
											x-on:click="expandList = false; selected = '{{ $female->name }}'" 
											wire:click="attach('mother', {{ $female->id }})"
											>
											{{ $female->name }}
										</li>
										@endforeach
									@endif
								</ul>
							</div>
						</div>
					</div>

					<!-- Checkboxes & Radios { car } -->
					<div class="car info-item">
						<div class="car__item car__radio">
							<p>Age: </p>
							<div class="form-check">
								<input  id="puppy"
										value="puppy"
										wire:model="age"
										type="radio" 
										class="form-check-input"
										checked>

								<label for="puppy" 
										class="form-check-label">
									Puppy
								</label>
							</div>

							<div class="form-check">
								<input  id="junior"
										value="junior"
										wire:model="age"
										type="radio" 
										class="form-check-input">

								<label for="junior" 
										class="form-check-label">
									Junior
								</label>
							</div>

							<div class="form-check">
								<input  id="adult"
										value="adult"
										wire:model="age"
										type="radio" 
										class="form-check-input">

								<label for="adult" 
										class="form-check-label">
									Adult
								</label>
							</div>

							<div class="form-check">
								<input  id="mature"
										value="mature"
										wire:model="age"
										type="radio" 
										class="form-check-input">

								<label for="mature" 
										class="form-check-label">
									Mature
								</label>
							</div>

							<div class="form-check">
								<input  id="senior"
										value="senior"
										wire:model="age"
										type="radio" 
										class="form-check-input">

								<label for="senior" 
										class="form-check-label">
									Senior
								</label>
							</div>
						</div>

						<hr>

						<div class="car__item car__radio">
							<p>Gender: </p>
							<div class="form-check">
								<input  id="male"
										wire:model="is_male"
										class="form-check-input"
										type="radio"
										value="male" >
								<label class="form-check-label" for="male">
									Male
								</label>
							</div>

							<div class="form-check">
								<input  id="female"
										checked
										wire:model="is_male"
										class="form-check-input" 
										type="radio"
										value="female">
								<label class="form-check-label" for="female">
									Female
								</label>
							</div>

							@error('gender')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>

						<hr>
						
						<div class="car__item car__check">
							<p>Other: </p>
					
							<div class="car__check--item form-check">
								<input id="is_for_sale"
									wire:model.debounce.400ms="is_for_sale"
									name="is_for_sale"
									class="form-check-input"
									type="checkbox">
									
								<label for="is_for_sale" class="form-check-label">
									For sale
								</label>

								@error('is_for_sale')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
					
							<div class="car__check--item form-check">
								<input id="has_fontanel"
									wire:model="has_fontanel"
									class="form-check-input"
									type="checkbox">
									
								<label for="has_fontanel" class="form-check-label">
									Has fontanel
								</label>

								@error('has_fontanel')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
					
							<div class="car__check--item form-check">
								<input id="is_open_for_breeding"
									wire:model="is_open_for_breeding"
									class="form-check-input"
									type="checkbox">
									
								<label for="is_open_for_breeding" class="form-check-label">
									Open for breeding
								</label>

								@error('is_open_for_breeding')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
						</div>
					</div>

					<!-- Titles -->
					<div class="titles info-item">
						<div class="form-group form-over">
							<label for="titles">
								Titles
							</label>

							<textarea wire:model="titles" 
									id="titles"
									class="form-control" >
							</textarea>

							@error('titles')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
					</div>

				</div>
			</div>
		</div>

		<button type="submit" class="submit-btn submit-btn__info btn btn-success mt-3 w-5" wire:click.prevent="saveInfo" >
			Next
			<div wire:loading wire:target="saveInfo">
				@include('includes.common.spinner')
			</div>
			<i wire:loading.class="d-none" class="fas fa-angle-double-right"></i>
		</button>
	</form>
</div>