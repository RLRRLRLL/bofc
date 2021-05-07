<ul>
	<li> {{-- Homepage --}} 
		<a class="link leave-page {{ checkLinks('/') }}" href="{{ route('homepage') }}" >
			<span class="link-text">
				{{ __('home') }}
			</span>
		</a>
	</li>

	<li> {{-- Poms page --}} 
		<a class="link leave-page {{ checkLinks('pomeranian') }}" href="{{ route('poms.index') }}">
			<span class="link-text">
				{{ __('pomeranian') }}
			</span>
		</a>
	</li>

	<li> {{-- Gallery --}} 
		<a class="link leave-page {{ checkLinks('gallery') }}" href="{{ route('gallery') }}">
			<span class="link-text">
				{{ __('gallery') }}
			</span>
		</a>
	</li>

	<li> {{-- News --}} 
		<a class="link leave-page {{ checkLinks('news') }}" href="#">
			<span class="link-text">
				{{ __('news') }}
			</span>
		</a>
	</li>

	<li> {{-- Admin Dashboard --}} 
		<a class="link {{ checkLinks('dashboard') }}" href="{{ route('admin') }}">
			<span class="link-text">
				Dashboard
			</span>
		</a>
	</li>

	<li class="enough-padding">  {{-- 'Contact Us' Modal --}} 
		<button class="btn-split btn-bestia contact-modal-trigger">
			<span>
				{{ __('get in touch') }}
			</span>
		</button>
	</li>
</ul>