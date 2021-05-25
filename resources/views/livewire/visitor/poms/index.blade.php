@section('page-title', __('Pomeranian'))

<main class="bg-dark py-12">
	<div class="container">
		<div 
			class="w-full grid gap-5 grid-cols-1" 
			x-data="{ showFilters: false, gridViewActive: true, listViewActive: false }"
			x-init="() => {
				showFilters = window.matchMedia('(min-width: 1024px)').matches
			}"
		>
			@include('includes.main.partials.pomeranian.header')

			@include('includes.main.partials.pomeranian.catalogue')

			{{-- <div class="poms__pagination">{{ $poms->links('vendor.pagination.default') }}</div> --}}
		</div>
	</div>
</main>