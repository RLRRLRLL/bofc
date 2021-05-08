@extends('layouts.main')

@section('page-title', __('Gallery'))

@section('content')
	<main class="main gallery" data-scroll-section>
		@include('includes.effects.shaders')

		<div id="canvas"></div>

		<div id="super-creative-circles">
			<span></span>
		</div>

		<div id="content">
			<!-- drag slider -->
			<div id="planes" data-animation="slideInUp" data-animation-delay="300ms">

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/7.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/8.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/4.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/5.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/6.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/3.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/9.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/10.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/11.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('demo1/12.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>
			</div>

			<div id="drag-tip">
				{{ __('Drag to explore') }}
			</div>
		</div>
	</main>
@endsection

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
	<script src="https://www.curtainsjs.com/build/curtains.min.js"></script>
@endpush