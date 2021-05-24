@section('page_title', __('News'))

<div>
    <x-admin.page-layout :title="__('All news')">
		<x-slot name="header_element">
			<a href="{{ route('admin.articles.create') }}" class="py-2 px-4 text-white bg-green-600 hover:bg-green-500 rounded shadow transition-colors">
				{{ __('Create an article') }}
			</a>
		</x-slot>

		<div class="grid gap-5 grid-cols-1 md:grid-cols-4">
			@forelse ($articles as $article)
				<figure class="relative flex flex-col shadow rounded-md border border-gray-800 overflow-hidden group hover:shadow-md">
					<a href="{{ route('admin.articles.show', $article->id) }}" class="absolute top-0 left-0 bottom-0 right-0 z-0 inline active:opacity-70"></a>
	
					<img 
						class="h-44 object-center object-cover"
						src="{{ $article->firstOrMain() }}"
					>
	
					<figcaption class="grid grid-cols-1 gap-3 p-5 bg-dark">
						<div class="flex items-center">
							<h3 class="text-xl text-white leading-none">
								{{ $article->title }}
	
								@if (!$article->is_published)
									<span class="text-red-400 text-opacity-50 text-sm">
										({{ __('draft') }})
									</span>
								@endif
							</h3>
						</div>
	
						<div class="flex flex-col">
							<p class="mb-3 text-gray-300">
								{{ $article->excerpt() }}
							</p>

							<p class="text-gray-500">
								{{ $article->created_at }}
							</p>
						</div>
	
						<button type="button" class="py-2 px-4 rounded shadow bg-amber text-dark font-medium transition">
							<span>{{ __('Learn more') }}</span>
						</button>
					</figcaption>
				</figure>
			@empty
				<div>
					<p class="text-gray-200">
						{{ __("No articles at the moment.") }}
					</p>
				</div>		
			@endforelse
		</div>
	</x-admin.page-layout>
</div>