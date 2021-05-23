<li>
	<a href="/" class="py-2 px-3 text-lg rounded text-white text-opacity-50 hover:text-opacity-70 transition-colors duration-75">
		<i class="mr-2 fas fa-home"></i>
		{{ __('Homepage') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.poms-create') }}" class="py-2 px-3 text-lg rounded text-white transition-colors duration-75 {{ request()->routeIs('admin.poms-create') ? 'text-opacity-90' : 'text-opacity-50 hover:text-opacity-70' }}">
		<i class="mr-2 fas fa-plus"></i>
		{{ __('Publish') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.poms-index') }}" class="py-2 px-3 text-lg rounded text-white transition-colors duration-75 {{ request()->routeIs('admin.poms-index') ? 'text-opacity-90' : 'text-opacity-50 hover:text-opacity-70' }}">
		<i class="mr-2 fas fa-dog"></i>
		{{ __('Pomeranians') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.articles.index') }}" class="py-2 px-3 text-lg rounded text-white text-opacity-50 hover:text-opacity-70 transition-colors duration-75 {{ request()->routeIs('admin.articles.index') ? 'text-opacity-90' : 'text-opacity-50 hover:text-opacity-70' }}">
		<i class="mr-2 fas fa-newspaper"></i>
		{{ __('News') }}
	</a>
</li>
<li>
	<a href="{{ route('admin.people') }}" class="py-2 px-3 text-lg rounded text-white transition-colors duration-75 {{ request()->routeIs('admin.people') ? 'text-opacity-90' : 'text-opacity-50 hover:text-opacity-70' }}">
		<i class="mr-2 fas fa-users"></i>
		{{ __('People') }}
	</a>
</li>