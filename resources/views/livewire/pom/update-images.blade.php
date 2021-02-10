<div class="single__right">
	<div class="single__right--upload">
		<button>
			Upload new
		</button>
	</div>

	<div class="single__right--grid">
		@foreach($pom->images as $image)
			<img src="{{ '/storage/images/'.$pom->id.'/'.$image->url}}" alt="Bubbles of Champain | Pomeranian Spitz | Померанский шпиц | {{ $pom->name }}" class="{{ ($image->is_avatar === 1) ? 'avatar' : '' }}">
		@endforeach
	</div>
</div>