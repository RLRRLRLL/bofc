@section('page_title', __('News'))

<div>
    <x-admin.page-layout :title="__('All news')">
		<x-slot name="header_element">
			<a href="{{ route('admin.articles.create') }}" class="py-2 px-4 text-white bg-green-600 hover:bg-green-500 rounded shadow transition-colors">
				{{ __('Create an article') }}
			</a>
		</x-slot>

		<div class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
			@forelse ($articles as $article)
				<div class="flex flex-col space-y-3">
					<h2>
						{{ $article->title }}
					</h2>

					<p>
						{{ $article->excerpt() }}
					</p>

					<p>
						{{ $article->created_at() }}
					</p>
				</div>
			@empty
				<p class="text-gray-300">
					{{ __('No articles at the moment.') }}
				</p>
			@endforelse 
		</div>
	</x-admin.page-layout>
</div>