<section class="grid gap-5" :class="gridViewActive ? 'grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4' : 'grid-cols-1 sm:grid-cols-2 lg:grid-cols-3'">
	@forelse ($poms as $pom)
		<figure 
			class="relative flex shadow rounded-md border border-gray-800 bg-dark-secondary overflow-hidden"
			:class="gridViewActive ? 'flex-col' : 'items-center justify-center p-5'"
			title="{{ __('Click to learn more.') }}"
		>
			<a href="{{ $pom->path() }}" class="leave-page absolute top-0 left-0 bottom-0 right-0 z-0 inline active:opacity-70"></a>

			<img 
				class="object-center object-cover" 
				:class="gridViewActive ? 'w-full h-48' : 'w-24 h-24 rounded-full shadow'"
				src="{{ $pom->avatarImage()}}"
			>

			<figcaption class="grid grid-cols-1" :class="gridViewActive ? 'h-full gap-3 p-5' : 'w-full pl-5 gap-5'">
				<div class="flex items-center" :class="{ 'justify-between': listViewActive }">
					<h3 class="text-xl font-leftonade tracking-wide text-white leading-none">
						{{ ucfirst($pom->name) }}
					</h3>

					<button type="button" class="items-center py-1 px-2 rounded shadow bg-amber text-dark font-medium" :class="gridViewActive ? 'hidden' : 'flex'">
						{{ __('View') }}

						<svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
						</svg>
					</button>
				</div>

				<div class="flex divide-gray-700" :class="gridViewActive ? 'flex-col divide-y' : 'pt-5 border-t border-gray-700'">
					<div :class="gridViewActive ? 'space-x-2 py-2' : 'flex flex-col flex-1'">
						<span class="text-gray-500 uppercase text-sm">
							{{ __('Age') }}
						</span>

						<span class="text-gray-100">
							{{ ucfirst(__($pom->age)) }}
						</span>
					</div>

					<div :class="gridViewActive ? 'space-x-2 py-2' : 'flex flex-col flex-1'">
						<span class="text-gray-500 uppercase text-sm">
							{{ __('Color') }}
						</span>

						<span class="text-gray-100">
							{{ __(ucfirst($pom->color)) }}
						</span>
					</div>

					<div :class="gridViewActive ? 'space-x-2 py-2' : 'flex flex-col flex-1'">
						<span class="text-gray-500 uppercase text-sm">
							{{ __('Gender') }}
						</span>

						<span class="text-gray-100 inline-flex items-center">
							{{ $pom->is_male === 1 ? __('Male') : __('Female') }}

							@if ($pom->is_male)
								<svg class="w-5 h-5 ml-1 fill-current text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M442 48h-90a22 22 0 0 0 0 44h36.89l-60.39 60.39c-68.19-52.86-167-48-229.54 14.57C31.12 234.81 31.12 345.19 99 413a174.21 174.21 0 0 0 246 0c62.57-62.58 67.43-161.35 14.57-229.54L420 123.11V160a22 22 0 0 0 44 0V70a22 22 0 0 0-22-22zM313.92 381.92a130.13 130.13 0 0 1-183.84 0c-50.69-50.68-50.69-133.16 0-183.84s133.16-50.69 183.84 0s50.69 133.16 0 183.84z"/></svg>
							@else
								<svg class="w-5 h-5 ml-1 fill-current text-red-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C8.691 2 6 4.691 6 8c0 2.967 2.167 5.432 5 5.91V17H8v2h3v2.988h2V19h3v-2h-3v-3.09c2.833-.479 5-2.943 5-5.91c0-3.309-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4s4 1.794 4 4s-1.794 4-4 4z"/></svg>
							@endif
						</span>
						
					</div>
				</div>

				<button type="button" class="py-2 px-4 rounded shadow bg-amber text-center text-dark font-bold" :class="gridViewActive ? 'block' : 'hidden'">
					<span>{{ __('Learn more') }}</span>
				</button>
			</figcaption>
		</figure>
	@empty
		<div>
			<p>
				{{ __("Oops! We didn't find any poms :(") }}
			</p>
		</div>		
	@endforelse
</section>
