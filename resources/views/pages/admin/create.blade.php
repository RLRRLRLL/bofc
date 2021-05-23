@extends('layouts.admin')

@section('page_title', __('Create pom'))

@push('styles')
	<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css"/>
@endpush

@section('content')
	<div class="container-create">
		{{-- Create New Pom Form --}}
		<div 
			x-data="{infoShow: true, imagesShow: false, showModal: true}"
			x-on:hide-info-section="infoShow = false; imagesShow = true"
			x-on:hide-images-section="imagesShow = false; "
			x-cloak
		>
			<div x-show.transition.in.duration.500ms="infoShow">
				<livewire:pom.upload-info />
			</div>

			<div x-show.transition.duration.700ms="imagesShow">
				<livewire:pom.upload-images />
			</div>

			<div x-data="{pomID: ''}"
				x-init="() => window.livewire.on('pom-created', (pom_id) => {
					pomID = pom_id;
					setTimeout(() => window.location.href = `/12a5155wo298d1u3d1j0/pom/${pomID}`, 500)
				})">
			</div>
		</div>
	</div>
@endsection

@push('scripts')
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js" 
		integrity="sha512-+ruHlyki4CepPr07VklkX/KM5NXdD16K1xVwSva5VqOVbsotyCQVKEwdQ1tAeo3UkHCXfSMtKU/mZpKjYqkxZA==" 
		crossorigin="anonymous">
	</script>
	<script>
		flatpickr('#datepicker', {});
	</script>
@endpush