<section class="poms__catalogue"
		:class="{'poms__catalogue--grid': gridViewActive, 'poms__catalogue--list': listViewActive}"
>
	@if($poms)
		@foreach ($poms as $pom)

			@inject('app', 'Illuminate\Contracts\Foundation\Application')
			@inject('urlGenerator', 'Illuminate\Routing\UrlGenerator')
			
			<figure class="cat-item" title="{{ __('Click to learn more.') }}">
				<a href="{{ route('poms.show', [ app()->getLocale(), 'id' => $pom->id]) }}" class="cat-item__link leave-page"></a>

				<img class="cat-item__image" src="{{ '/storage/images/'.$pom->id.'/'}}{{ ($pom->images()->where('is_avatar', 1)->first() !== null) ? $pom->images()->where('is_avatar', 1)->first()->url : $pom->images()->first()->url }}"
				>

				<figcaption class="cat-item__desc">
					<div class="cat-item__desc--title">
						<h3>
							{{ ucfirst($pom->name) }}
						</h3>
						<svg class="gender-svgs">
							<use xlink:href="/sprite.svg#{{ 
								($pom->is_male === 1) ? 'male' : 'fem'
								}}">
							</use>
						</svg>
					</div>

					<div class="cat-item__desc--indications">
						<div class="indi__el">
							<span class="indi__el--title">
								{{ __('Age') }}
							</span>
							<span class="indi__el--indication">
								{{ __($pom->age) }}
							</span>
						</div>
						<div class="indi__el">
							<span class="indi__el--title">
								{{ __('Color') }}
							</span>
							<span class="indi__el--indication">
								{{ __(ucfirst($pom->color)) }}
							</span>
						</div>
						<div class="indi__el">
							<span class="indi__el--title">{{ __('Gender') }}</span>
							<span class="indi__el--indication">
								{{ $pom->is_male === 1 ? __('Male') : __('Female') }}
							</span>
						</div>
					</div>

					<button type="button" class="cat-item__desc--cta">
						<span>{{ __('Learn more') }}</span>
					</button>
				</figcaption>
			</figure>

		@endforeach
	@endif
</section>
