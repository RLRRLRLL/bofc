@php
	$locale_is_en = app()->getLocale() === 'en';
@endphp

<a 
	href="{{ route('change-language', $locale_is_en ? 'ru' : 'en') }}"
	class="inline-flex items-center mr-3 md:mr-0 md:ml-1"
	x-on:click="if ($refs.langToggler.classList.contains('translate-x-full')) { $refs.langToggler.classList.remove('translate-x-full'); $refs.langToggler.classList.add('translate-x-0'); } else { $refs.langToggler.classList.add('translate-x-full'); $refs.langToggler.classList.remove('translate-x-0'); }"
>
	<span class="text-gray-50 leftonade {{ $locale_is_en ? '' : 'text-opacity-40' }}">EN</span>

	<div class="relative mx-2">
		<span class="block w-10 h-6 bg-gray-400 rounded-full shadow-inner"></span>

		<span x-ref="langToggler" class="absolute block w-4 h-4 mt-1 ml-1 bg-white rounded-full shadow inset-y-0 left-0 focus-within:shadow-outline transition-transform duration-300 ease-in-out transform | {{ $locale_is_en ? 'translate-x-0' : 'translate-x-full' }}"></span>
	</div>
	
	<span class="text-gray-50 leftonade {{ $locale_is_en ? 'text-opacity-40' : '' }}">RU</span>
</a>
