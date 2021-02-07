@extends('layouts.admin')

@section('content')
<div class="container-create">
	<!-- create new pom form -->
	<div x-data="{infoShow: false, imagesShow: true}"
		x-on:hide-info-section.window="infoShow = false; imagesShow = true">
		<div x-show="infoShow" id="infoSection">
			<livewire:info/>
		</div>
		<div x-show="imagesShow" id="imagesSection">
			<livewire:images/>
		</div>
	</div>
</div>
@endsection

@push('scripts')
	<script>
	</script>
@endpush