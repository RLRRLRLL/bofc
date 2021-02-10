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

						<div class="form-group form-over">
							<label for="breeder">
								Breeder: <span>{{ $breeder }}</span>
							</label>

							<input id="breeder"
									wire:model.debounce.400ms="breeder"
									name="breeder"
									type="text" 
									class="form-control" 
									placeholder="Enter breeder">

							@error('breeder')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="owner">
								Owner: <span>{{ $owner }}</span>
							</label>

							<input id="owner"
									wire:model.debounce.400ms="owner"
									name="owner"
									type="text" 
									class="form-control" 
									placeholder="Enter owner">

							@error('owner')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="father">
								Father: <span>{{ $father }}</span>
							</label>

							<input id="father"
									wire:model.debounce.400ms="father"
									name="father"
									type="text" 
									class="form-control" 
									placeholder="Enter father">

							@error('father')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="mother">
								Mother: <span>{{ $mother }}</span>
							</label>

							<input id="mother"
									wire:model.debounce.400ms="mother"
									name="mother"
									type="text" 
									class="form-control" 
									placeholder="Enter mother">

							@error('mother')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="grandfather">
								Grandfather: <span>{{ $grandfather }}</span>
							</label>

							<input id="grandfather"
									wire:model.debounce.400ms="grandfather"
									name="grandfather"
									type="text" 
									class="form-control" 
									placeholder="Enter grandfather">

							@error('grandfather')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->

						<div class="form-group form-over">
							<label for="grandmother">
								Grandmother: <span>{{ $grandmother }}</span>
							</label>

							<input id="grandmother"
									wire:model.debounce.400ms="grandmother"
									name="grandmother"
									type="text" 
									class="form-control" 
									placeholder="Enter grandmother">

							@error('grandmother')
								<p class="text-danger">{{ $message }}</p>
							@enderror
						</div> <!-- ------------------------------------- -->
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
			<i class="fas fa-angle-double-right"></i>
		</button>
	</form>
</div>