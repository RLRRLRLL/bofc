<section class="poms__catalogue ai ai__from-bottom ai__with-delay"
		:class="{'poms__catalogue--grid': gridViewActive, 'poms__catalogue--list': listViewActive}"
>
	@if($poms)
		@foreach ($poms as $pom)
			
			<figure class="cat-item scale">
				<img class="cat-item__image" src="{{ '/storage/images/'.$pom->id.'/'}}{{ ($pom->images()->where('is_avatar', 1)->first() !== null) ? $pom->images()->where('is_avatar', 1)->first()->url : $pom->images()->first()->url }}"
				>

				<div class="cat-item__desc">
					<div class="cat-item__desc--title">
						<h3>
							{{ ucfirst($pom->name) }}
						</h3>
						<svg class="gender-svgs">
							<use xlink:href="/sprite.svg#{{ 
								($pom->gender == 'male') ? 'male' : 'fem'
								}}">
							</use>
						</svg>
					</div>

					<div class="cat-item__desc--indications">
						<div class="indi__el">
							<span class="indi__el--title">Type</span>
							<span class="indi__el--indication">
								{{ $pom->is_puppy ? 'Puppy' : 'Figure' }}
							</span>
						</div>
						<div class="indi__el">
							<span class="indi__el--title">Size</span>
							<span class="indi__el--indication">Medium</span>
						</div>
						<div class="indi__el">
							<span class="indi__el--title">Gender</span>
							<span class="indi__el--indication">
								{{ $pom->gender == 'male' ? 'Male' : 'Female' }}
							</span>
						</div>
					</div>

					<button class="cat-item__desc--cta btn-ripple">
						<span class="idc-text">Learn more</span>
					</button>
				</div>
			</figure>

		@endforeach
	@endif

</section>
