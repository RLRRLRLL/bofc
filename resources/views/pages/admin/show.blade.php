@extends('layouts.admin')

@push('styles')
	<link 
		rel="stylesheet" 
		href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css"
	/>
@endpush

@section('content')
	<div class="single" x-data="{activeTab: 'info'}" x-cloak>
		<div class="single__tabs">
			<button 
				class="single__tabs--item" 
				:class="{'active': activeTab == 'info'}" 
				x-on:click="activeTab = 'info'"
			>
				Info
				<i class="fas fa-info-circle"></i>
			</button>

			<button 
				class="single__tabs--item" 
				x-on:click="activeTab = 'images'" 
				:class="{'active': activeTab == 'images'}"
			>
				Images
				<i class="fas fa-image"></i>
			</button>
		</div>

		<livewire:pom.update-info :id="$id"/>

		<livewire:pom.update-images :id="$id"/>
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