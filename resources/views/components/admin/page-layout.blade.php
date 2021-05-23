@props([
	'title'
])

<div class="space-y-5">
	<h1 class="text-3xl text-gray-300 font-medium">
		{{ $title }}
	</h1>

	<div class="p-5 rounded shadow bg-admin-secondary">
		{{ $slot }}
	</div>
</div>