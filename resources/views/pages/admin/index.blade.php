@extends('layouts.admin')

@section('content')
	<div class="main__inner">
		<div class="poms">
			<div class="poms-title">
				<h1>All poms</h1>
			</div>
			<div class="poms-inner">
				<!-- -->
				@if($poms)
					@foreach($poms as $pom)
							<a href="{{ route('show.new.pom', ['id' => $pom->id]) }}" class="pom">
								<h6 class="pom-name" style="color: {{ ($pom->gender == 'male') ? '#80bdff' : '#ffc5f0'}};">
									{{ ucfirst($pom->name) }}
									<svg class="gender-svgs">
										<use xlink:href="/sprite.svg#{{ 
											($pom->gender == 'male') ? 'male' : 'fem'
											}}">
										</use>
									</svg>
								</h6>

								<img 
									src="{{ '/storage/images/'.$pom->id.'/'}}{{ ($pom->images()->where('is_avatar', 1)->first() !== null) ? $pom->images()->where('is_avatar', 1)->first()->url : $pom->images()->first()->url }}" 
									alt="Bubbles of Champain | {{ $pom->name }}"
									class="pom-img"
								>

								<button type="button" class="pom-cta">
									Find out more
								</button>
							</a>
					@endforeach
				@endif
				<!-- -->
			</div>
		</div>
	</div>
@endsection