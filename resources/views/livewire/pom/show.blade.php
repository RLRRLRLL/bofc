<div class="show">
	<section class="show__header anim-item fadeInUp anim-delay show-section" data-scroll data-scroll-class="anim-stop">
		<h1>
			{{ ucfirst($pom->name) }}
		</h1>
		<button>
			Ask about {{ ucfirst($pom->name) }}
		</button>
	</section>

	<div class="show__body anim-item fadeInUp anim-delay-medium" data-scroll data-scroll-class="anim-stop">
		<div class="show__body--slider">
			<!-- Gallery Lighthouse -->
			<section class="swiper-container gallery-top show-section">
				<div class="swiper-wrapper">
					@foreach($pom->images as $image)
						<div class="swiper-slide" style="background-image: url({{ '/storage/images/'.$pom->id.'/'.$image->url}});">
						</div>
					@endforeach
				</div>
			</section>

			<!-- Gallery Thumbnails -->
			<section class="swiper-container gallery-thumbs show-section">
				<div class="swiper-wrapper">
					@foreach($pom->images as $image)
						<div class="swiper-slide swiper-lazy" data-background="{{ '/storage/images/'.$pom->id.'/'.$image->url}}">
							<div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
						</div>
					@endforeach
				</div>
			</section>
		</div>
		
		<!-- Info -->
		<div class="show__body--info">
			<section class="info__primary show-section">
				<div class="info__primary--item">
					<p class="item-title">name</p>
					<p class="item-value">{{ ucfirst($pom->name) }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">gender</p>
					<p class="item-value">{{ ($pom->is_male) ? 'Male' : 'Female' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">color</p>
					<p class="item-value">{{ !is_null($pom->color) ? ucfirst($pom->color) : 'N/A' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">age</p>
					<p class="item-value">{{ ucfirst($pom->age) ?? 'N/A' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">birthday</p>
					<p class="item-value">{{ $pom->birthday ?? 'N/A' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">teeth</p>
					<p class="item-value">{{ $pom->teeth ?? 'N/A' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">fontanel</p>
					<p class="item-value">{{ $pom->has_fontanel === 1 ? 'Yes' : 'No' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">for sale</p>
					<p class="item-value">{{ $pom->is_for_sale === 1 ? 'Yes' : 'No' }}</p>
				</div>
			</section>

			@if ($pom->is_open_for_breeding)
				<section class="info__is-open show-section">
					<span>
						<svg class="info__is-open--svg">
							<use xlink:href="/sprite.svg#info"></use>
						</svg>
					</span>
					<h3 class="info__is-open--txt">{{ $pom->name }} is open for breeding</h3>
				</section>
			@endif
			
			<section class="info__rels show-section">
				<h3 class="info__rels--title">
					More about {{ $pom->name }}
				</h3>

				<ul class="info__rels--list">
					<li>
						<span class="info-title">Father:</span>
						@if ($poms->find($pom->father_id) != null)
							<a href="{{ route('poms.show', ['id' => $pom->father_id]) }}" class="info-link">{{ $poms->find($pom->father_id)->name }}</a>
						@else
							<span class="info-na">Not specified</span>
						@endif
					</li>
					<li>
						<span class="info-title">Mother:</span>
						@if ($poms->find($pom->mother_id) != null)
							<a href="{{ route('poms.show', ['id' => $pom->mother_id]) }}" class="info-link">{{ $poms->find($pom->mother_id)->name }}</a>
						@else
							<span class="info-na">Not specified</span>
						@endif	
					</li>
					<li>
						<span class="info-title">Grandfather:</span>
						@if ($poms->find($pom->grandfather_id) != null)
							<a href="{{ route('poms.show', ['id' => $pom->grandfather_id]) }}" class="info-link">{{ $poms->find($pom->grandfather_id)->name }}</a>
						@else
							<span class="info-na">Not specified</span>
						@endif
					</li>
					<li>
						<span class="info-title">Grandmother:</span>
						@if ($poms->find($pom->grandmother_id) != null)
							<a href="{{ route('poms.show', ['id' => $pom->grandmother_id]) }}" class="info-link">{{ $poms->find($pom->grandmother_id)->name }}</a>
						@else
							<span class="info-na">Not specified</span>
						@endif
					</li>
					<li>
						<span class="info-title">Owner:</span>
						@if ($pom->owner)
							<span class="info-na">{{ $pom->owner->owner }}</span>
						@else
							<span class="info-na">Not specified</span>
						@endif
					</li>
					<li>
						<span class="info-title">Breeder:</span>
						@if ($pom->breeder)
							<span class="info-na">{{ $pom->breeder->breeder }}</span>
						@else
							<span class="info-na">Not specified</span>
						@endif
					</li>
				</ul>
			</section>
		</div>
	</div>
</div>