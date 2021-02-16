<div class="info" x-show.transition.in.duration.350ms="activeTab == 'info'">
	
	<h2 class="info__name">
		{{ $pom->name }} 
		<span>
			({{ ($pom->is_published == 1) ? 'published' : 'not published' }})
		</span>

		<svg class="gender-svgs">
			<use xlink:href="/sprite.svg#{{ 
				($pom->gender == 'male') ? 'male' : 'fem'
				}}">
			</use>
		</svg>
	</h2>

	<section class="info__inner">
		<!-- inputs -->
		<div class="info__inner--item info__inner--type">
			<ul>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.nameInput) setTimeout(() => $refs.nameInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Name:<span>{{ $pom->name }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="name" wire:model="name" x-ref="nameInput">
						<button type="button" wire:click="updateInfo('name')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.genderInput) setTimeout(() => $refs.genderInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Gender:<span>{{ $pom->gender }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="gender" wire:model="gender" x-ref="genderInput">
						<button type="button" wire:click="updateInfo('gender')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.colorInput) setTimeout(() => $refs.colorInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Color:<span>{{ $pom->color }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="color" wire:model="color" x-ref="colorInput">
						<button type="button" wire:click="updateInfo('color')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.heightInput) setTimeout(() => $refs.heightInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Height:<span>{{ $pom->height }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="height" wire:model="height" x-ref="heightInput">
						<button type="button" wire:click="updateInfo('height')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.weightInput) setTimeout(() => $refs.weightInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Weight:<span>{{ $pom->weight }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="weight" wire:model="weight" x-ref="weightInput">
						<button type="button" wire:click="updateInfo('weight')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.teethInput) setTimeout(() => $refs.teethInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Teeth:<span>{{ $pom->teeth }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="teeth" wire:model="teeth" x-ref="teethInput">
						<button type="button" wire:click="updateInfo('teeth')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.birthdayInput) setTimeout(() => $refs.birthdayInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Birthday:<span>{{ $pom->birthday }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="birthday" wire:model="birthday" x-ref="birthdayInput">
						<button type="button" wire:click="updateInfo('birthday')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>
				
			</ul>
		</div>

		<!-- togglers -->
		<div class="info__inner--item info__inner--toggler">
			<ul>
				<li> Published: <span wire:click="toggleParam('is_published')">{{ ($pom->is_published == 1) ? 'Yes' : 'No' }}</span></li>
				<li> For sale: <span wire:click="toggleParam('is_for_sale')">{{ ($pom->is_for_sale == 1) ? 'Yes' : 'No' }}</span></li>
				<li> Has fontanel: <span wire:click="toggleParam('has_fontanel')">{{ ($pom->has_fontanel == 1) ? 'Yes' : 'No' }}</span></li>
				<li> Puppy: <span wire:click="toggleParam('is_puppy')">{{ ($pom->is_puppy == 1) ? 'Yes' : 'No' }}</span></li>
			</ul>
		</div>

		<!-- selects -->
		<div class="info__inner--item info__inner--select">
			<ul class="pom__selects">

				<!-- Select item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($males->find($pom->father_id) != null)
						<label>
							Father: <span>{{ $males->find($pom->father_id)->name }}</span>
						</label>
					@else
						<label>
							Father not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select a pom'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="$set('father_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($males)
								@foreach($males as $male)
									<li x-on:click="expandList = false; selected = '{{ $male->name }}'" wire:click="applyOption('father_id', {{ $male->id }})">
										{{ $male->name }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<!-- Select item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($females->find($pom->mother_id) != null)
						<label>
							Mother: <span>{{ $females->find($pom->mother_id)->name }}</span>
						</label>
					@else
						<label>
							Mother not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select a pom'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="$set('mother_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($females)
								@foreach($females as $female)
									<li x-on:click="expandList = false; selected = '{{ $female->name }}'" 
										wire:click="applyOption('mother_id', {{ $female->id }})"
										 >
										{{ $female->name }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<!-- Select item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($males->find($pom->grandfather_id) != null)
						<label>
							Grandfather: <span>{{ $males->find($pom->grandfather_id)->name }}</span>
						</label>
					@else
						<label>
							Grandfather not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select a pom'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="$set('grandfather_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($males)
								@foreach($males as $male)
									<li x-on:click="expandList = false; selected = '{{ $male->name }}'" 
										wire:click="applyOption('grandfather_id', {{ $male->id }})"
										 >
										{{ $male->name }} 
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<!-- Select item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($females->find($pom->grandmother_id) != null)
						<label>
							Grandmother: <span>{{ $females->find($pom->grandmother_id)->name }}</span>
						</label>
					@else
						<label>
							Grandmother not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select a pom'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="$set('grandmother_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($females)
								@foreach($females as $female)
									<li x-on:click="expandList = false; selected = '{{ $female->name }}'" 
										wire:click="applyOption('grandmother_id', {{ $female->id }})"
										 >
										{{ $female->name }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<!-- Breeder item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($breeders->find($pom->breeder_id) != null)
						<label>
							Breeder: <span>{{ $breeders->find($pom->breeder_id)->breeder }}</span>
						</label>
					@else
						<label>
							Breeder not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select breeder'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="applyOption('breeder_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($breeders)
								@foreach($breeders as $breeder)
									<li x-on:click="expandList = false; selected = '{{ $breeder->breeder }}'" wire:click="applyOption('breeder_id', {{ $breeder->id }})">
										{{ $breeder->breeder }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<!-- Owner item -->
				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					@if ($owners->find($pom->owner_id) != null)
						<label>
							Owner: <span>{{ $owners->find($pom->owner_id)->owner }}</span>
						</label>
					@else
						<label>
							Owner not selected
						</label>
					@endif

					<div class="select">
						<button 
							class="select__button" 
							type="button"
							x-on:click.prevent="expandList =! expandList"
							:class="{'active': expandList === true}"
							x-text="selected || 'Select owner'"
						></button>

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="applyOption('owner_id', null)">
								Select later
							</li>

							<!-- loop -->
							@if($owners)
								@foreach($owners as $owner)
									<li x-on:click="expandList = false; selected = '{{ $owner->owner }}'" wire:click="applyOption('owner_id', {{ $owner->id }})">
										{{ $owner->owner }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>
			</ul>
		</div>

		<!-- titles -->
		<div class="info__inner--item info__inner--titles">
			<ul>
				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.titlesInput) setTimeout(() => $refs.titlesInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Titles:<span>{{ $pom->titles }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit">
						<textarea id="titles" wire:model="titles" x-ref="titlesInput" rows="100" ></textarea>
						<button type="button" wire:click="updateInfo('titles')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="prop__edit--svg">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>
			</ul>
			
		</div>
	</section>
	
</div>