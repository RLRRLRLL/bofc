<div class="poms" x-data="{gridViewActive: true, listViewActive: false}" data-scroll-container>
	<!-- header not related, only for grid styling purposes -->
	@include('includes.main.partials.pomeranian.header')

	<!-- livewire related -->
    @include('includes.main.partials.pomeranian.filter')
	@include('includes.main.partials.pomeranian.catalogue')

	<div class="poms__pagination">{{ $poms->links('vendor.pagination.default') }}</div>
</div>