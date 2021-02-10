@extends('layouts.admin')

@section('content')
<div class="container-create">
	<!-- create new pom form -->
	<div 
		x-data="{infoShow: true, imagesShow: false}"
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
				setTimeout(() => window.location.href = `/admin/pom/${pomID}`, 500)
			})">
		</div>

	</div>
</div>
@endsection