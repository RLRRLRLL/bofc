@props([
	'title', 'header_element'
])

<div class="mt-7 space-y-5">
	<div class="flex flex-col space-y-3 md:space-y-0 md:flex-row md:items-center md:justify-between">
		<h1 class="text-4xl text-white font-semibold tracking-wide">
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