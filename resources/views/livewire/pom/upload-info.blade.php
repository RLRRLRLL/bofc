<div>
	<form id="addPomForm" wire:submit.prevent="saveInfo">
		@csrf
		
		<div>
			<div class="card">
				<div class="card-header">
					<h2>Info</h2>
				</div>
				<div class="card-body card-body__info">
					<!-- Errors -->
					<div class="error-wrapper">

					</div>
					
					<!-- Info fill-up -->
					<div class="inputs">

						<div class="form-group form-over">
							<label> Name: <span>{{ $name }}</span> </label>
							<input wire:model.debounce.400ms="name" class="form-control">
							@error('name') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

						<div class="form-group form-over">
							<label> Color: <span>{{ $color }}</span> </label>
							<input wire:model.debounce.400ms="color" class="form-control">
							@error('color') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

						<div class="form-group form-over">
							<label> Height: <span>{{ $height }}</span> </label>
							<input wire:model.debounce.400ms="height" class="form-control">
							@error('height') <p class="text-danger">{{ $message }}</p> @enderror
						</div> 

						<div class="form-group form-over">
							<label> Weight: <span>{{ $weight }}</span> </label>
							<input wire:model.debounce.400ms="weight" class="form-control">
							@error('weight') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

						<div class="form-group form-over">
							<label> Teeth: <span>{{ $teeth }}</span> </label>
							<input wire:model.debounce.400ms="teeth" class="form-control">
							@error('teeth') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

						<div class="form-group form-over">
							<label> Birthday: <span>{{ $birthday }}</span> </label>
							<input wire:model.debounce.400ms="birthday" class="form-control">
							@error('birthday') <p class="text-danger">{{ $message }}</p> @enderror
						</div>

					</div>

					<hr>

					<!-- Selects -->
					<div class="selects">
						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Owner: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button"
									x-on:click.prevent="expandList =! expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select owner'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" 
										wire:click="$set('owner', null)"
										>
										Select later
									</li>
									<!-- loop -->
									@foreach($people->where('type', 0) as $owner)
										<li 
											x-on:click="expandList = false; selected = '{{ $owner->name }}'" 
											wire:click="$set('owner', {{ $owner->id }})"
										>
											{{ $owner->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Breeder: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
									x-on:click.prevent="expandList =! expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select breeder'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="expandList = false; selected = ''" 
										wire:click="$set('breeder', null)"
										>
										Select later
									</li>
									<!-- loop -->
									@foreach($people->where('type', 1) as $breeder)
										<li 
											x-on:click="expandList = false; selected = '{{ $breeder->name }}'" 
											wire:click="$set('breeder', {{ $breeder->id }})"
											 
										>
											{{ $breeder->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>

						<!-- Family select relationships -->
						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Father: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
									x-on:click.prevent="expandList =! expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select a pom'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="
										expandList = false; 
										selected = ''
									" wire:click="$set('father_id', null)">
										Select later
									</li>
									<!-- loop -->
									@foreach($males as $male)
										<li 
											x-on:click="expandList = false; selected = '{{ $male->name }}'" 
											wire:click="$set('father_id', {{ $male->id }})"
											 
										>
											{{ $male->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Mother: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
									x-on:click.prevent="expandList =! expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select a pom'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="
										expandList = false; 
										selected = ''
									" wire:click="$set('mother_id', null)">
										Select later
									</li>
									<!-- loop -->
									@foreach($females as $fem)
										<li 
											x-on:click="expandList = false; selected = '{{ $fem->name }}'" 
											wire:click="$set('mother_id', {{ $fem->id }})"
											 
										>
											{{ $fem->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Grandfather: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
									x-on:click.prevent="expandList=!expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select a pom'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li x-on:click="
										expandList = false;
										selected = ''
									" wire:click="$set('grandfather_id', null)">
										Select later
									</li>
									<!-- loop -->
									@foreach($males as $male)
										<li 
											x-on:click="expandList = false; selected = '{{ $male->name }}'" 
											wire:click="$set('grandfather_id', {{ $male->id }})"
											 
										>
											{{ $male->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Grandmother: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
									x-on:click.prevent="expandList =! expandList"
									:class="{'active': expandList === true}"
									x-text="selected || 'Select a pom'"
								></button>

								<ul 
									class="select__list" 
									x-show.transition.duration.250ms="expandList"
									x-on:click.away="expandList = false"
								>
									<!-- fallback option -->
									<li 
										x-on:click="expandList = false; selected = ''" 
										wire:click="$set('grandmother_id', null)"
										 
									>
										Select later
									</li>
									<!-- loop -->
									@foreach($females as $fem)
										<li x-on:click="
											expandList = false;
											selected = '{{ $fem->name }}'
										" wire:click="$set('grandmother_id', {{ $fem->id }})">
											{{ $fem->name }}
										</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>

					<hr>

					<!-- Checkboxes & Radios { car } -->
					<div class="car">
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
										checked
										wire:model="gender"
										name="gender"
										class="form-check-input"
										type="radio"
										value="male" >
								<label class="form-check-label" for="male">
									Male
								</label>
							</div>

							<div class="form-check">
								<input  id="female"
										wire:model="gender"
										name="gender"
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

						<div class="car__item car__radio">
							<p>Fontanel: </p>
							<div class="form-check">
								<input  id="hasnt"
										value="hasnt"
										wire:model="has_fontanel"
										name="has_fontanel"
										type="radio" 
										class="form-check-input"
										checked>

								<label for="hasnt" 
										class="form-check-label">
									Hasn't
								</label>
							</div>

							<div class="form-check">
								<input  id="has"
										value="has"
										wire:model="has_fontanel"
										name="has_fontanel"
										type="radio" 
										class="form-check-input">

								<label for="has" 
										class="form-check-label">
									Has
								</label>
							</div>
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
						</div>
					</div>
					
					<hr>

					<!-- Titles -->
					<div class="titles">
						<div class="form-group form-over">
							<label for="titles">
								Titles: <span>{{ $titles }}</span>
							</label>

							<input id="titles"
									wire:model.debounce.400ms="titles"
									name="titles"
									type="text" 
									class="form-control" 
									placeholder="Enter titles">

							@error('titles')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div>
					</div>

				</div>
			</div>
		</div>

		<button type="submit"
				class="submit-btn submit-btn__info btn btn-success mt-3 w-5"
				wire:click.prevent="saveInfo"
				>
			Next
			<div wire:loading wire:target="saveInfo">
				@include('includes.common.spinner')
			</div>
			<i wire:loading.class="d-none" class="fas fa-angle-double-right"></i>
		</button>
	</form>
</div>