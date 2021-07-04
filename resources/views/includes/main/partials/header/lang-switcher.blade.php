<div class="mr-5 sm:mr-0 md:ml-2">
	@foreach ($langs as $lang)
		<a 
			href="{{ route('change-language', $lang) }}"
			class="
				inline-flex items-center text-gray-200 font-medium
				@if ($loop->first) pr-1 @endif
				@if (!$loop->first) pl-2 border-l-2 border-gray-500 @endif
				@if (app()->getLocale() === $lang) opacity-50 pointer-events-none @endif
				@if (app()->getLocale() !== $lang) hover:text-white @endif
			"
		>
			{{ strtoupper($lang) }}
		</a>
	@endforeach
</div>