<header class="absolute top-0 left-0 right-0 w-full flex z-10">
	<div class="container">
		<div>
			<div class="flex items-center justify-between">
				{{-- brand --}}
				<a href="{{ request()->routeIs('homepage') ? '#' : route('homepage') }}" class="flex items-center space-x-5">
					<span class="inline-block w-12 h-12 bg-yellow-300 rounded-full"></span>

					{{-- <h3 class="font-astra font-bold text-3xl tracking-wide text-gray-100">
						{{ config('app.name') }}
					</h3> --}}
				</a>

				{{-- nav --}}
				<div class="flex items-center space-x-10">
					{{-- change website lang --}}
					<button type="button" class="btn-locale">
						<span>
							EN
						</span>

						<svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><g fill="none"><path d="M7.987 4.18a12.213 12.213 0 0 0-.669 2.32h5.364a12.21 12.21 0 0 0-.67-2.32c-.301-.733-.648-1.294-1.008-1.663C10.646 2.149 10.307 2 10 2c-.307 0-.646.149-1.004.517c-.36.37-.707.93-1.009 1.663z" fill="currentColor"/><path d="M7.89 2.281c-.313.426-.59.941-.827 1.518c-.32.78-.58 1.694-.762 2.701H2.804a8.02 8.02 0 0 1 5.087-4.219z" fill="currentColor"/><path d="M12.11 2.281c.313.426.59.941.827 1.518c.32.78.58 1.694.762 2.701h3.497a8.02 8.02 0 0 0-5.087-4.219z" fill="currentColor"/><path d="M17.602 7.5H13.85c.098.795.15 1.634.15 2.5c0 .866-.052 1.705-.15 2.5h3.752A7.993 7.993 0 0 0 18 10c0-.873-.14-1.713-.398-2.5z" fill="currentColor"/><path d="M17.196 13.5h-3.497c-.182 1.007-.441 1.922-.762 2.7a7.189 7.189 0 0 1-.827 1.519a8.02 8.02 0 0 0 5.086-4.219z" fill="currentColor"/><path d="M10 18c.307 0 .646-.149 1.004-.517c.36-.37.707-.93 1.008-1.663a12.21 12.21 0 0 0 .67-2.32H7.318c.168.873.397 1.657.67 2.32c.301.733.648 1.294 1.008 1.663c.358.368.697.517 1.004.517z" fill="currentColor"/><path d="M7.89 17.719A8.02 8.02 0 0 1 2.805 13.5h3.497c.182 1.007.441 1.922.762 2.7c.237.578.514 1.093.828 1.519z" fill="currentColor"/><path d="M2.398 12.5H6.15A20.524 20.524 0 0 1 6 10c0-.866.052-1.705.15-2.5H2.398A7.993 7.993 0 0 0 2 10c0 .873.14 1.713.398 2.5z" fill="currentColor"/><path d="M7 10c0-.875.056-1.715.158-2.5h5.684c.102.785.158 1.625.158 2.5s-.056 1.714-.158 2.5H7.158A19.438 19.438 0 0 1 7 10z" fill="currentColor"/></g></svg>
					</button>
					
					{{-- go to poms page --}}
					<a href="{{ route('poms.index') }}" class="header-link">
						Pomeranians
	
						<svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" viewBox="0 0 496 752" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd"><g><polygon class="fil0" points="373,376 0,691 51,752 496,376 51,0 0,61 "></polygon></g></svg>
					</a>
				</div>
				
			</div>
		</div>
	</div>
</header>