@extends('layouts.admin')

@push('styles')
	<link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/airbnb.css"/>
@endpush

@section('content')
	<div class="bg-admin-secondary p-5 rounded shadow" x-data="{ activeTab: 'info' }" x-cloak>
		<div class="w-full flex mb-5 rounded-md divide-x divide-gray-700 border border-gray-700">
			<button 
				class="w-2/4 text-lg p-3 transition focus:ring-0" 
				:class="activeTab === 'info' ? 'text-white bg-[#424242]' : 'text-white text-opacity-60'" 
				x-on:click="activeTab = 'info'"
			>
				{{ __('Info') }}
				<i class="fas fa-info-circle ml-1"></i>
			</button>

			<button 
				class="w-2/4 text-lg p-3 transition focus:ring-0" 
				x-on:click="activeTab = 'images'" 
				:class="activeTab === 'images' ? 'text-white bg-[#424242]' : 'text-white text-opacity-60'" 
			>
				{{ __('Images') }}
				<i class="fas fa-image ml-1"></i>
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