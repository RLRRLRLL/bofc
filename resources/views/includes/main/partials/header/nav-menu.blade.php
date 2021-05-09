{{-- classes => ul, link => anchor, cta => btn-bestia --}}

<ul class="{{ $classes ?? '' }}">
	<li> {{-- Homepage --}} 
		<a class="circle-link leave-page {{ checkLinks('/') }} {{ $link ?? '' }}" href="{{ route('homepage') }}">
			<span class="circle-link-text">
				{{ __('Home') }}
			</span>
		</a>
	</li>

	<li> {{-- Poms page --}} 
		<a class="circle-link leave-page {{ checkLinks('pomeranian') }} {{ $link ?? '' }}" href="{{ route('poms.index') }}">
			<span class="circle-link-text">
				{{ __('Pomeranian') }}
			</span>
		</a>
	</li>

	<li> {{-- Gallery --}} 
		<a class="circle-link leave-page {{ checkLinks('gallery') }} {{ $link ?? '' }}" href="{{ route('gallery') }}">
			<span class="circle-link-text">
				{{ __('Gallery') }}
			</span>
		</a>
	</li>

	<li> {{-- News --}} 
		<a class="circle-link leave-page {{ checkLinks('news') }} {{ $link ?? '' }}" href="#">
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
		<button class="btn-border-zoom contact-modal-trigger {{ $cta ?? '' }}">
			<span>
				{{ __('Get in touch') }}
			</span>
		</button>
	</li>
</ul>