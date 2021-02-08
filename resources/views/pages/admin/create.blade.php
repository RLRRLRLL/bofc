@extends('layouts.admin')

@section('content')
<div class="container-create">
	<!-- create new pom form -->
	{{-- <div x-data="{infoShow: true, imagesShow: false, titlesShow: false}"
		x-on:hide-info-section="infoShow = false; imagesShow = true"
		x-on:hide-images-section="imagesShow = false; titlesShow = true"
		x-on:hide-titles-section="titlesShow = false">

		<div x-show.transition.in.duration.500ms="infoShow">
			<livewire:info />
		</div>

		<div x-show.transition.duration.700ms="imagesShow">
			<livewire:images />
		</div>
		
		<div x-show.transition.duration.700ms="titlesShow">
			<livewire:titles />
		</div>

	</div> --}}

	<!-- //////////// TESTING 'n' STYLING ///////////////// -->
	<div x-data="{infoShow: false, imagesShow: false, titlesShow: true}"
		x-on:hide-info-section="infoShow = false; imagesShow = true"
		x-on:hide-images-section="imagesShow = false; titlesShow = true"
		x-on:hide-titles-section="titlesShow = false">

		<div x-show.transition.in.duration.500ms="infoShow">
			<livewire:info />
		</div>

		<div x-show.transition.duration.700ms="imagesShow">
			<livewire:images />
		</div>
		
		<div x-show.transition.duration.700ms="titlesShow">
			<livewire:titles />
		</div>

	</div>
</div>
@endsection