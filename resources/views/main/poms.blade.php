@extends('layouts.main')

@section('page-title', 'All poms')

@section('content')
    <div class="wrapper poms">
		<div class="container">
			<div class="poms__inner">
				<div id="cursor" class="cursor"></div>
				{{-- @include('includes.main.brand') --}}
				<div id="poms" class="select">
					<a href="#" 
						class="select_selected"
						data-poms="all">
						<span class="select_naming">All</span>
						<span class="select_arrow-cont">
							<svg>
								<use xlink:href="/sprite.svg#selectArrow"></use>
							</svg>
						</span>
						
					</a>
					<ul class="select_list">
						<li data-poms="all" class="show">All</li>
						<li data-poms="male">Male</li>
						<li data-poms="female">Female</li>
						<li data-poms="champ">Champ</li>
						<li data-poms="puppies">Puppies</li>
					</ul>
				</div>

				@include('includes.main.gallery')
			</div>
		</div>
		
		{{-- <div id="change-view" class="change-view">
			<h3 class="change-view__title">
				Change view type to single
			</h3>
		</div> --}}
    </div>
@endsection