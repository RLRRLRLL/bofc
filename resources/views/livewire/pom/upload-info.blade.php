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
					<div class="inputs">
						<div class="form-group form-over">
							<label for="name">
								Name: <span>{{ $name }}</span>
							</label>

							<input id="name"
									wire:model.debounce.400ms="name"
									name="name"
									type="text" 
									class="form-control" 
									placeholder="Enter name">

							@error('name')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- -------------------------------------- -->

						<div class="form-group form-over">
							<label for="color">
								Color: <span>{{ $color }}</span>
							</label>

							<input id="color"
									wire:model.debounce.400ms="color"
									name="color"
									type="text" 
									class="form-control" 
									placeholder="Enter color">

							@error('color')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="height">
								Height: <span>{{ $height }}</span>
							</label>

							<input id="height"
									wire:model.debounce.400ms="height"
									name="height"
									type="text" 
									class="form-control" 
									placeholder="Enter height">

							@error('height')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="weight">
								Weight: <span>{{ $weight }}</span>
							</label>

							<input id="weight"
									wire:model.debounce.400ms="weight"
									name="weight"
									type="text" 
									class="form-control" 
									placeholder="Enter weight">

							@error('weight')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="teeth">
								Teeth: <span>{{ $teeth }}</span>
							</label>

							<input id="teeth"
									wire:model.debounce.400ms="teeth"
									name="teeth"
									type="text" 
									class="form-control" 
									placeholder="Enter teeth">

							@error('teeth')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="birthday">
								Birthday: <span>{{ $birthday }}</span>
							</label>

							<input id="birthday"
									wire:model.debounce.400ms="birthday"
									name="birthday"
									type="text" 
									class="form-control" 
									placeholder="Enter birthday">

							@error('birthday')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over" x-data="{expandList: false, selected: ''}">
							<label>
								Owner: <span x-text="selected"></span>
							</label>

							<div class="select">
								<button 
									class="select__button" 
									type="button"
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
										wire:click="$set('owner_id', null)"
										>
										Select later
									</li>
									<!-- loop -->
									@foreach($owners as $owner)
										<li 
											x-on:click="expandList = false; selected = '{{ $owner->owner }}'" 
											wire:click="$set('owner_id', {{ $owner->id }})"
											 
										>
											{{ $owner->owner }}
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
										wire:click="$set('breeder_id', null)"
										>
										Select later
									</li>
									<!-- loop -->
									@foreach($breeders as $breeder)
										<li 
											x-on:click="expandList = false; selected = '{{ $breeder->breeder }}'" 
											wire:click="$set('breeder_id', {{ $breeder->id }})"
											 
										>
											{{ $breeder->breeder }}
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

					<!-- Checkboxes & Radios { car } -->
					<div class="car">
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
								<input id="is_puppy"
										wire:model.debounce.400ms="is_puppy"
										name="is_puppy"
										class="form-check-input"
										type="checkbox">

								<label for="is_puppy" class="form-check-label">
									Puppy
								</label>

								@error('is_puppy')
										<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
					
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