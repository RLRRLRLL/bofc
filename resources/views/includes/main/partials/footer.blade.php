@php
	$footer_link_classes = 'inline-block bitter text-lg tracking-wide font-medium text-gray-200 hover:text-gray-100 hover:border-gray-500 py-2 px-4 border-2 border-gray-700 active:border-gray-400 focus:border-gray-400 focus:text-gray-100 transition-colors';
@endphp

<footer id="footer" class="section py-10 lg:py-14 bg-dark-secondary" data-scroll-section>
	<div class="container">
		<div class="grid gap-y-5 grid-cols-1">
			<!-- Navigation -->
			<div class="">
				<ul class="h-full flex flex-col justify-center md:flex-row items-center space-y-5 md:space-y-0 md:space-x-5">
					<li>
						<a class="{{ $footer_link_classes }}" href="{{ route('homepage') }}">
							{{ __('Home') }}
						</a>
					</li>
					<li>
						<a class="{{ $footer_link_classes }}" href="#">
							{{ __('News & Articles') }}
						</a>
					</li>
					<li>
						<a class="{{ $footer_link_classes }}" href="{{ route('poms.index') }}">
							{{ __('Pomeranian') }}
						</a>
					</li>
					<li>
						<a class="{{ $footer_link_classes }}" href="{{ route('gallery') }}">
							{{ __('Gallery') }}
						</a>
					</li>
					<li>
						<button class="{{ $footer_link_classes }}" type="button" id="back-to-top">
							{{ __('Back to top') }}
						</button>
					</li>
				</ul>
			</div>
			
			<!-- Social -->
			<div class="py-8 md:py-10">
				<ul class="flex justify-center items-center space-x-5">
					<li>
						<a href="#" class="flex items-center justify-center p-2 shadow-md text-gray-900 rounded-full bg-amber">
							<span>
								<svg class="fill-current w-7 h-7">
									<use xlink:href="/sprite.svg#inst"></use>
								</svg>
							</span>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center justify-center p-2 shadow-md text-gray-900 rounded-full bg-amber">
							<svg class="fill-current w-7 h-7">
								<use xlink:href="/sprite.svg#fb"></use>
							</svg>
						</a>
					</li>
					<li>
						<a href="#" class="flex items-center justify-center p-2 shadow-md text-gray-900 rounded-full bg-amber">
							<svg class="fill-current w-7 h-7">
								<use xlink:href="/sprite.svg#wp"></use>
							</svg>
						</a>
					</li>
				</ul>
			</div>

			<!-- Copyright -->
			<div class="leftonade">
				<div class="flex flex-col items-center">
					<h3 class="mb-2 text-xl text-gray-200">
						{{ config('app.name') }} &copy; 2014-2021
					</h3>

					@php
						$developer_website = null;
					@endphp

					@if (!is_null($developer_website))
						<div class="flex items-center space-x-1 leftonade text-gray-500">
							<span>
								Made with
							</span>

							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
							</svg>

							<span>
								by
							</span>

							<a class="underline text-red-500 text-opacity-80 hover:text-opacity-100 hover:text-gray-100" href="{{ 'https://'.$developer_website }}" target="_blank">
								{{ $developer_website }}
							</a>
						</div>
					@endif 

					<p class="{{ !is_null($developer_website) ? 'mt-2' : '' }} text-lg text-gray-400">
						{{ __('All rights reserved.') }}
					</p>
				</div>
			</div>
		</div>
	</div>
</footer>