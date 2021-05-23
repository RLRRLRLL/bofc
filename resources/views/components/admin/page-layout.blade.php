@props([
	'title', 'header_element'
])

<div class="space-y-5">
	<div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:items-center md:justify-between">
		<h1 class="text-3xl text-gray-300 font-medium">
			{{ $title }}
		</h1>

		<div>
			{{ $header_element ?? '' }}
		</div>
	</div>

	<div class="p-5 rounded shadow bg-admin-secondary">
		{{ $slot }}
	</div>
</div>