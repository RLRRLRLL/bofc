@php
	$classes = "py-2 px-3 text-2xl md:text-lg rounded text-white text-opacity-90 md:text-opacity-60 hover:text-opacity-100 transition-colors duration-75";
@endphp

<li>
	<a href="/" class="{{ $classes }}">
		<i class="mr-2 fas fa-home"></i>
		{{ __('Homepage') }}
	</a>
</li>

<li>
	<a href="{{ route('admin.poms-index') }}" class="{{ $classes }}">
		<i class="mr-2 fas fa-dog"></i>
		{{ __('Pomeranians') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.articles.index') }}" class="{{ $classes }}">
		<i class="mr-2 fas fa-newspaper"></i>
		{{ __('News') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.people') }}" class="{{ $classes }}">
		<i class="mr-2 fas fa-users"></i>
		{{ __('People') }}
	</a>
</li>