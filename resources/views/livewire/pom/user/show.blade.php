<div class="show">
	<section class="show__header" data-animation="slideInUp"  data-animation-delay="100ms">
		<h1>
			{{ ucfirst($pom->name) }}
		</h1>
		<button>
			Ask about {{ ucfirst($pom->name) }}
		</button>
	</section>

	<section class="show__body"  data-animation="slideInUp"  data-animation-delay="500ms">
		<figure class="show__body--slider" x-data="{trans: false}">
			<!-- -->
			<div class="big-slide-cont">
				<img 
					class="big-slide" 
					src="{{ '/storage/images/'.$pom->id.'/'.$pom->images->find($image_id)->url}}"
					:class="{'slide-transition': trans}"
				>
			</div>
			<!-- -->
			@foreach($pom->images as $image)
				<div>
					<img
						wire:click="changeSlide({{ $image->id }})"
						x-on:click="trans = true; setTimeout(() => trans = false, 350)"
						class="slide"
						src="{{ '/storage/images/'.$pom->id.'/'.$image->url}}"
					>
				</div>
			@endforeach
		</figure>

		<figure class="show__body--info">
			<div class="info__primary">
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
					<p class="item-value">{{ ucfirst($pom->color) }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">age</p>
					<p class="item-value">{{ ucfirst($pom->age) }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">birthday</p>
					<p class="item-value">{{ $pom->birthday }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">teeth</p>
					<p class="item-value">{{ $pom->teeth }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">fontanel</p>
					<p class="item-value">{{ $pom->has_fontanel === 1 ? 'Yes' : 'No' }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">for sale</p>
					<p class="item-value">{{ $pom->is_for_sale === 1 ? 'Yes' : 'No' }}</p>
				</div>
			</div>

			@if ($pom->is_open_for_breeding)
				<div class="info__is-open">
					<h3>{{ $pom->name }} is open for breeding</h3>
				</div>
			@endif

			<hr>
			
			<div class="info__rels">
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
			</div>
		</figure>
	</section>

	<section class="show__footer">

	</section>
</div>