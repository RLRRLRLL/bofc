@extends('layouts.admin')

@section('content')
	<div class="poms">
		<div class="poms-title">
			<h1>All poms</h1>
		</div>

		<div class="poms-inner">
			@if($poms)
				@foreach($poms as $pom)
					
						<div class="pom">
							@if($pom->images()->count() == 0)
								<img class="pom-img" src="https://via.placeholder.com/150" alt="Bubbles of Champain | {{ $pom->name }}">
							@else
								<img class="pom-img" src="{{ '/storage/images/'.$pom->id.'/'}}{{ ($pom->images()->where('is_avatar', 1)->first() !== null) ? $pom->images()->where('is_avatar', 1)->first()->url : $pom->images()->first()->url }}" alt="Bubbles of Champain | {{ $pom->name }}">
							@endif

							<div class="pom-info">
								<h6 class="pom-info__name">
									{{ ucfirst($pom->name) }}
									@if($pom->images()->count() == 0)
										<small class="text-danger" style="font-size: 14px;">&nbsp;(has no images)</small>
									@endif
									<svg class="gender-svgs">
										<use xlink:href="/sprite.svg#{{ 
											($pom->is_male == 1) ? 'male' : 'fem'
											}}">
										</use>
									</svg>
								</h6>
								<p class="pom-info__timestamps">
									<span>Created at</span>
									<span>{{ date('d-m-Y', strtotime($pom->created_at)) }}</span>
								</p>
								<a href="{{ route('show.new.pom', ['id' => $pom->id, app()->getLocale()]) }}" class="pom-info__cta">
									Learn more
								</a>
							</div>
						</div>
				@endforeach
			@endif
		</div>
	</div>
@endsection