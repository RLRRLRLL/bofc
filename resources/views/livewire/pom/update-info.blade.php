<div class="info" x-show.transition.in.duration.350ms="activeTab == 'info'">
	
	<h2 class="info__name">
		{{ $pom->name }} 
		<span>
			({{ ($pom->is_published == 1) ? 'published' : 'not published' }})
		</span>

		<svg class="gender-svgs">
			<use xlink:href="/sprite.svg#{{ 
				($pom->is_male == 1) ? 'male' : 'fem'
				}}">
			</use>
		</svg>
	</h2>

	<section class="info__inner">
		<!-- inputs -->
		<div class="info__inner--item info__inner--type">
			<ul>
				@foreach($base_info as $item)
					<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.{{ $item }}Input) setTimeout(() => $refs.{{ $item }}Input.focus(), 250)}" x-on:click.away="showEdit=false">
						<div class="prop__current">
							{{ ucfirst($item) }}:<span>{{ $pom->$item }}</span>
						</div>
						<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
							<input id="{{ $item }}" wire:model="{{ $item }}" x-ref="{{ $item }}Input">
							<button type="button" wire:click="updateInfo('{{ $item }}')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
								<svg class="prop__edit--svg">
									<use xlink:href="/sprite.svg#check"></use>
								</svg>
							</button>
						</div>
					</li>
				@endforeach

				<li class="prop" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.birthdayInput) setTimeout(() => $refs.birthdayInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="prop__current">
						Birthday :<span>{{ $pom->birthday }}</span>
					</div>
					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input id="datepicker" wire:model="birthday" x-ref="birthdayInput">
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
				<li> Published: <span wire:click="toggleParam('is_published')">{{ ($pom->is_published) ? 'Yes' : 'No' }}</span></li>
				<li> For sale: <span wire:click="toggleParam('is_for_sale')">{{ ($pom->is_for_sale) ? 'Yes' : 'No' }}</span></li>
				<li> Has fontanel: <span wire:click="toggleParam('has_fontanel')">{{ ($pom->has_fontanel) ? 'Yes' : 'No' }}</span></li>
				<li> Open for breeding: <span wire:click="toggleParam('is_open_for_breeding')">{{ ($pom->is_open_for_breeding) ? 'Yes' : 'No' }}</span></li>
				<li> Gender: <span wire:click="toggleParam('is_male')">{{ ($pom->is_male) ? 'Male' : 'Female' }}</span></li>
			</ul>
		</div>

		<!-- selects -->
		<div class="info__inner--item info__inner--select">
			<ul class="pom__selects">

				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					<label>
						Father:
						@if ($father != null)
							<span>{{ $father->name }}</span>
						@else
							<span x-text="selected || 'Father not selected'"></span>
						@endif	
					</label>

					<div class="select">
						@include('includes.admin.select-btn')

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="detach('father', 'parents')">
								Select later
							</li>

							<!-- loop -->
							@if($poms)
								@foreach($poms->where('is_male', 1) as $male)
									<li x-on:click="expandList = false; selected = '{{ $male->name }}'" wire:click="attach('father', {{ $male->id }})">
										{{ $male->name }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					<label>
						Mother:
						@if ($mother != null)
							<span>{{ $mother->name }}</span>
						@else
							<span x-text="selected || 'Mother not selected'"></span>
						@endif	
					</label>
					
					<div class="select">
						@include('includes.admin.select-btn')

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="detach('mother', 'parents')">
								Select later
							</li>

							<!-- loop -->
							@if($poms)
								@foreach($poms->where('is_male', 0) as $female)
									<li x-on:click="expandList = false; selected = '{{ $female->name }}'" wire:click="attach('mother', {{ $female->id }})">
										{{ $female->name }}
									</li>
								@endforeach	
							@endif
						</ul>
					</div>
				</div>

				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					<label>
						Breeder:
						@if ($breeder != null)
							<span>{{ $breeder->name }}</span>
						@else
							<span x-text="selected || 'Breeder not selected'"></span>
						@endif	
					</label>

					<div class="select">
						@include('includes.admin.select-btn')

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="detach('breeder', 'people')">
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

				<div class="pom__selects--item" x-data="{expandList: false, selected: ''}">
					<label>
						Owner:
						@if ($owner != null)
							<span>{{ $owner->name }}</span>
						@else
							<span x-text="selected || 'Owner not selected'"></span>
						@endif	
					</label>

					<div class="select">
						@include('includes.admin.select-btn')

						<ul class="select__list" x-show.transition.duration.250ms="expandList" x-on:click.away="expandList = false">
							<!-- fallback option -->
							<li x-on:click="expandList = false; selected = ''" wire:click="detach('owner', 'people')">
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