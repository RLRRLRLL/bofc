@section('page-title', __('Pomeranian'))

@section('data-page', 'poms-index')

<main class="bg-dark py-12">
	<div class="container">
		<div 
			class="w-full grid gap-5 grid-cols-1" 
			x-data="{ showFilters: false, gridViewActive: true, listViewActive: false }"
		>
			@include('includes.main.partials.pomeranian.header')

			@include('includes.main.partials.pomeranian.catalogue')

			{{-- <div class="poms__pagination">{{ $poms->links('vendor.pagination.default') }}</div> --}}
		</div>
	</div>
</main>