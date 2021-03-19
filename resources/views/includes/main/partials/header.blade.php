<header class="header" data-scroll-section>
	<div class="container">
		<!-- desktop -->
		<nav class="header__desktop">
			<ul>

				<li>
					<a class="link leave-page {{ Route::currentRouteName() === 'homepage' ? 'active' : '' }}" href="{{ route('homepage', app()->getLocale()) }}" >
						<span class="link-text">
							{{ __('home') }}
						</span>
					</a>
				</li>

				<li>
					<a class="link leave-page {{ checkLinks('pomeranian') }}" href="{{ route('poms.index', app()->getLocale()) }}">
						<span class="link-text">
							{{ __('pomeranian') }}
						</span>
					</a>
				</li>

				<li>
					<a class="link leave-page {{ checkLinks('gallery') }}" href="{{ route('gallery', app()->getLocale()) }}">
						<span class="link-text">
							{{ __('gallery') }}
						</span>
					</a>
				</li>

				<li>
					<a class="link leave-page {{ checkLinks('news') }}" href="#">
						<span class="link-text">
							{{ __('news') }}
						</span>
					</a>
				</li>

				<li>
					<a class="link {{ checkLinks('dashboard') }}" href="/admin">
						<span class="link-text">Dashboard</span>
					</a>
				</li>

				<li class="enough-padding">
					<button class="btn-split btn-bestia contact-modal-trigger">
						<span>
							{{ __('get in touch') }}
						</span>
					</button>
				</li>

				<li class="lang" x-data="{ showDrop: false, result: '{{ app()->getLocale() }}'.toUpperCase() }">
					<button 
						class="lang-result" 
						:class="{'active': showDrop}"
						type="button" 
						@click.prevent="showDrop = !showDrop"
					>
						<span class="lang-result__text" x-text="result.toUpperCase()"></span>
						<svg class="lang-result__svg">
							<use xlink:href="/sprite.svg#arrow"></use>
						</svg>
					</button>
					<ul class="lang-drop" x-show.transition.duration.250ms="showDrop">
						@foreach($langs as $lang)
							<li class="lang-drop__item" :class="{'active': result === '{{ $lang }}'.toUpperCase()}">
								<a 
									class="lang-link leave-page"
									href="{{ route(Route::currentRouteName(), [$lang, '']) }}" 
									x-on:click="result = '{{ $lang }}'; showDrop = false"
									x-text="'{{ $lang }}'.toUpperCase()"
								>
								</a>
							</li>
						@endforeach
					</ul>
				</li>

			</ul>
		</nav>	

		<!-- mobile -->
	</div>
</header>