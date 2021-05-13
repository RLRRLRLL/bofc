@php
	// repeating label and value classes
	$label = 'text-gray-400 text-lg';
	$value = 'inline-block ml-1 text-amber text-lg';
@endphp

<div class="p-5" x-show="activeTab == 'info'">
	<h2 class="flex items-center mb-5 text-3xl text-gray-200">
		{{ $pom->name }} 

		<span class="inline-block ml-2 text-2xl text-gray-400">
			({{ ($pom->is_published == 1) ? 'published' : 'not published' }})
		</span>

		@if ($pom->is_male)
			<svg class="w-7 h-7 ml-2 fill-current text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M442 48h-90a22 22 0 0 0 0 44h36.89l-60.39 60.39c-68.19-52.86-167-48-229.54 14.57C31.12 234.81 31.12 345.19 99 413a174.21 174.21 0 0 0 246 0c62.57-62.58 67.43-161.35 14.57-229.54L420 123.11V160a22 22 0 0 0 44 0V70a22 22 0 0 0-22-22zM313.92 381.92a130.13 130.13 0 0 1-183.84 0c-50.69-50.68-50.69-133.16 0-183.84s133.16-50.69 183.84 0s50.69 133.16 0 183.84z"/></svg>
		@else
			<svg class="w-7 h-7 ml-2 fill-current text-red-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C8.691 2 6 4.691 6 8c0 2.967 2.167 5.432 5 5.91V17H8v2h3v2.988h2V19h3v-2h-3v-3.09c2.833-.479 5-2.943 5-5.91c0-3.309-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4s4 1.794 4 4s-1.794 4-4 4z"/></svg>
		@endif
	</h2>

	<section class="grid grid-cols-3">
		<!-- inputs -->
		<div class="">
			<ul>
				@foreach($base_info as $item)
					<li class="flex flex-col cursor-pointer p-1 space-y-1" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.{{ $item }}Input) setTimeout(() => $refs.{{ $item }}Input.focus(), 250)}" x-on:click.away="showEdit=false">
						<div class="group">
							<span class="{{ $label }}">
								{{ ucfirst($item) }}:
							</span>
							<span class="{{ $value }} group-hover:underline">
								{{ $pom->$item }}
							</span>
						</div>
						<div class="flex items-center" x-show.transition.duration.250ms="showEdit" x-cloak>
							<input class="mt-1 bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0" type="text" id="{{ $item }}" wire:model="{{ $item }}" x-ref="{{ $item }}Input" value="{{ $pom->$item }}">

							<button class="ml-2 text-green-500" type="button" wire:click="updateInfo('{{ $item }}')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
								<svg class="fill-current w-5 h-5">
									<use xlink:href="/sprite.svg#check"></use>
								</svg>
							</button>
						</div>
					</li>
				@endforeach

				<li class="flex flex-col cursor-pointer p-1 space-y-1" x-data="{showEdit:false, focusChange:false}" x-on:click="if (!focusChange) {showEdit=true; if ($refs.birthdayInput) setTimeout(() => $refs.birthdayInput.focus(), 250)}" x-on:click.away="showEdit=false">
					<div class="group">
						<span class="{{ $label }}">
							Birthday:
						</span>
						<span class="{{ $value }} group-hover:underline">
							{{ $pom->birthday }}
						</span>
					</div>

					<div class="prop__edit" x-show.transition.duration.250ms="showEdit" x-cloak>
						<input class="mt-1 bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0" type="text" id="datepicker" wire:model="birthday" x-ref="birthdayInput">
						<button class="ml-2 text-green-500" type="button" wire:click="updateInfo('birthday')" x-on:click="focusChange = true;showEdit=false; setTimeout(() => focusChange=false, 200)">
							<svg class="fill-current w-5 h-5">
								<use xlink:href="/sprite.svg#check"></use>
							</svg>
						</button>
					</div>
				</li>
			</ul>
		</div>

		<!-- togglers -->
		<div class="">
			<ul>
				<li class="p-1">
					<span class="{{ $label }}">
						Published:
					</span>
					<span wire:click="toggleParam('is_published')" class="{{ $value }} cursor-pointer underline hover:no-underline">
						{{ ($pom->is_published) ? 'Yes' : 'No' }}
					</span>
				</li>
				<li class="p-1">
					<span class="{{ $label }}">
						For sale:
					</span>
					<span wire:click="toggleParam('is_for_sale')" class="{{ $value }} cursor-pointer underline hover:no-underline">
						{{ ($pom->is_for_sale) ? 'Yes' : 'No' }}
					</span>
				</li>
				<li class="p-1">
					<span class="{{ $label }}">
						Has fontanel:
					</span>
					<span wire:click="toggleParam('has_fontanel')" class="{{ $value }} cursor-pointer underline hover:no-underline">
						{{ ($pom->has_fontanel) ? 'Yes' : 'No' }}
					</span>
				</li>
				<li class="p-1">
					<span class="{{ $label }}">
						Open for breeding:
					</span>
					<span wire:click="toggleParam('is_open_for_breeding')" class="{{ $value }} cursor-pointer underline hover:no-underline">
						{{ ($pom->is_open_for_breeding) ? 'Yes' : 'No' }}
					</span>
				</li>
				<li class="p-1">
					<span class="{{ $label }}">
						Gender:
					</span>
					<span wire:click="toggleParam('is_male')" class="{{ $value }} cursor-pointer underline hover:no-underline">
						{{ ($pom->is_male) ? 'Male' : 'Female' }}
					</span>
				</li>
			</ul>
		</div>

		<!-- selects -->
		<div class="">
			<ul class="space-y-3">
				{{-- Select Item --}}
				<x-admin.forms.select-dropdown>
					<x-slot name="label">
						<span class="{{ $label }}">
							Father:
						</span>

						@if ($father != null)
							<span class="{{ $value }}">{{ $father->name }}</span>
						@else
							<span x-text="selected || 'Father not selected'" class="{{ $value }}"></span>
						@endif	
					</x-slot>

					<x-slot name="iteration">
						<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = ''" wire:click="detach('father', 'parents')">
							Select later
						</li>

						@forelse ($poms->where('is_male', 1) as $male)
							<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = '{{ $male->name }}'" wire:click="attach('father', {{ $male->id }})">
								{{ $male->name }}
							</li>
						@empty
							
						@endforelse
					</x-slot>
				</x-admin.forms.select-dropdown>

				{{-- Select Item --}}
				<x-admin.forms.select-dropdown>
					<x-slot name="label">
						<span class="{{ $label }}">
							Mother:
						</span>

						@if ($mother != null)
							<span class="{{ $value }}">{{ $mother->name }}</span>
						@else
							<span x-text="selected || 'Mother not selected'" class="{{ $value }}"></span>
						@endif	
					</x-slot>

					<x-slot name="iteration">
						<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = ''" wire:click="detach('mother', 'parents')">
							Select later
						</li>

						@forelse($poms->where('is_male', 0) as $female)
							<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = '{{ $female->name }}'" wire:click="attach('father', {{ $female->id }})">
								{{ $female->name }}
							</li>
						@empty
						@endforelse	
					</x-slot>
				</x-admin.forms.select-dropdown>

				{{-- Select Item --}}
				<x-admin.forms.select-dropdown>
					<x-slot name="label">
						<span class="{{ $label }}">
							Breeder:
						</span>

						@if ($breeder != null)
							<span class="{{ $value }}">{{ $breeder->name }}</span>
						@else
							<span x-text="selected || 'Breeder not selected'" class="{{ $value }}"></span>
						@endif	
					</x-slot>

					<x-slot name="iteration">
						<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = ''" wire:click="detach('breeder', 'people')">
							Select later
						</li>

						@forelse($people->where('type', 1) as $breeder)
							<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = '{{ $breeder->name }}'" wire:click="attach('breeder', {{ $breeder->id }})">
								{{ $breeder->name }}
							</li>
						@empty
						@endforelse	
					</x-slot>
				</x-admin.forms.select-dropdown>

				{{-- Select Item --}}
				<x-admin.forms.select-dropdown>
					<x-slot name="label">
						<span class="{{ $label }}">
							Owner:
						</span>

						@if ($owner != null)
							<span class="{{ $value }}">{{ $owner->name }}</span>
						@else
							<span x-text="selected || 'Owner not selected'" class="{{ $value }}"></span>
						@endif	
					</x-slot>

					<x-slot name="iteration">
						<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = ''" wire:click="detach('breeder', 'people')">
							Select later
						</li>

						@forelse($people->where('type', 0) as $owner)
							<li class="py-2 px-3 text-gray-300 cursor-pointer" x-on:click="open = false; selected = '{{ $owner->name }}'" wire:click="attach('breeder', {{ $owner->id }})">
								{{ $owner->name }}
							</li>
						@empty
						@endforelse	
					</x-slot>
				</x-admin.forms.select-dropdown>
			</ul>
		</div>

		<!-- titles -->
		<div>
			<ul>
				<li class="flex flex-col">
					<label for="titles" class="{{ $label }}">
						{{ __('Titles') }}: 
						<span class="{{ $value }}">
							{{ $pom->titles }}
						</span>
					</label>

					<textarea class="w-full mt-1 bg-gray-800 text-gray-100 rounded border border-gray-600 focus:border-gray-400 focus:ring-0 placeholder-amber" id="titles" wire:model="titles" x-ref="titles"></textarea>

					<button type="button" wire:click="updateInfo('titles')" x-on:click="console.log($refs.titles.value)" class="mt-2 bg-dark bg-opacity-80 text-white py-2 px-4 rounded shadow">
						{{ __('Save titles') }}
					</button>
				</li>
			</ul>
		</div>
	</section>
</div>