@extends('layouts.main')

@section('page-title', 'Gallery')

@section('content')
	<div class="wrapper gallery">
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
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/1.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>

				<div class="plane-wrapper">
					<div class="plane">
						<img src="{{ asset('images/random-dogs/2.jpg') }}" data-sampler="planeTexture" crossorigin />
					</div>
				</div>
			</div>

			<div id="drag-tip">
				Drag to explore
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.min.js"></script>
	<script src="https://www.curtainsjs.com/build/curtains.min.js"></script>
@endpush