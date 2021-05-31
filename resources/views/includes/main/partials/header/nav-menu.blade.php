{{-- classes => ul, link => anchor, cta => btn-bestia --}}

<ul class="{{ $classes ?? '' }}">
	<li> {{-- Homepage --}} 
		<a class="circle-link {{ checkLinks('/') }} {{ $link ?? '' }}" href="{{ route('homepage') }}" data-leave>
			<span class="circle-link-text">
				{{ __('Home') }}
			</span>
		</a>
	</li>

	<li> {{-- Poms page --}} 
		<a class="circle-link {{ checkLinks('pomeranian') }} {{ $link ?? '' }}" href="{{ route('poms.index') }}" data-leave>
			<span class="circle-link-text">
				{{ __('Pomeranian') }}
			</span>
		</a>
	</li>

	<li> {{-- Gallery --}} 
		<a class="circle-link {{ checkLinks('gallery') }} {{ $link ?? '' }}" href="{{ route('gallery') }}" data-leave>
			<span class="circle-link-text">
				{{ __('Gallery') }}
			</span>
		</a>
	</li>

	<li> {{-- News --}} 
		<a class="circle-link {{ checkLinks('news') }} {{ $link ?? '' }}" href="#" data-leave>
			<span class="circle-link-text">
				{{ __('News') }}
			</span>
		</a>
	</li>

	{{-- Admin Dashboard (TEMP) --}} 
	{{-- <li> 
		<a class="circle-link {{ checkLinks('Dashboard') }} {{ $link ?? '' }}" href="{{ route('admin') }}">
			<span class="circle-link-text">
				{{ __('Dashboard') }}
			</span>
		</a>
	</li> --}}

	<hr class="border-t border-gray-600">

	<li> {{-- 'Contact Us' Modal --}}
		<button class="btn-border-zoom contact-modal-trigger font-medium {{ $cta ?? '' }}">
			<span>
				{{ __('Get in touch') }}
			</span>
		</button>
	</li>
</ul>