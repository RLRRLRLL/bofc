@section('page_title', __('Create an article'))

<div x-data>
    <x-admin.page-layout :title="__('New article')">
		<x-slot name="header_element">
			<button type="button" x-on:click="window.history.go(-1); return false;" class="flex items-center font-medium text-2xl text-gray-500 hover:text-amber transition-colors duration-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
				</svg>

				{{ __('Go back') }}
			</button>
		</x-slot>
		
		<div>
			hey thurrrrrrrr
		</div>
	</x-admin.page-layout>
</div>
