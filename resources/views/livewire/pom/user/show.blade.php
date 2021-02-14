<div class="show">
	<section class="show__header">
		<h1>
			{{ ucfirst($pom->name) }}
		</h1>
		<button>
			Ask about {{ ucfirst($pom->name) }}
		</button>
	</section>

	<section class="show__body">
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
					<p class="item-value">{{ ucfirst($pom->gender) }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">color</p>
					<p class="item-value">{{ ucfirst($pom->color) }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">type</p>
					<p class="item-value">{{ $pom->is_puppy === 1 ? 'Puppy' : 'Fix it' }}</p>
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
					<p class="item-title">birthday</p>
					<p class="item-value">{{ $pom->birthday }}</p>
				</div>
				<div class="info__primary--item">
					<p class="item-title">for sale</p>
					<p class="item-value">{{ $pom->is_for_sale === 1 ? 'Yes' : 'No' }}</p>
				</div>
			</div>

			<hr>
			
			<div class="info__rels">
				<h3 class="info__rels--title">
					More about {{ $pom->name }}
				</h3>

				<ul class="info__rels--list">
					<li>
						<span class="info-title">Father:</span>
						<a href="#" class="info-link">{{ $pom->father }}</a>
					</li>
					<li>
						<span class="info-title">Mother:</span>
						<a href="#" class="info-link">{{ $pom->mother }}</a>
					</li>
					<li>
						<span class="info-title">Grandfather:</span>
						<a href="#" class="info-link">{{ $pom->grandfather }}</a>
					</li>
					<li>
						<span class="info-title">Grandmother:</span>
						<a href="#" class="info-link">{{ $pom->grandmother }}</a>
					</li>
					<li>
						<span class="info-title">Owner:</span>
						<a href="#" class="info-link">{{ $pom->owner }}</a>
					</li>
					<li>
						<span class="info-title">Breeder:</span>
						<a href="#" class="info-link">{{ $pom->breeder }}</a>
					</li>
				</ul>
			</div>
		</figure>
	</section>

	<section class="show__footer">

	</section>
</div>