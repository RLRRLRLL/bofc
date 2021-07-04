@extends('layouts.admin')

@section('page_title', __('All poms'))

@section('content')
	<poms-list
		:poms="{{ $poms }}"
	/>
	
	<!-- 
	<x-admin.page-layout :title="__('All poms')">
		<x-slot name="header_element">
			<a href="{{ route('admin.poms-create') }}" class="flex items-center font-medium text-2xl text-gray-500 hover:text-amber transition-colors duration-100">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
				</svg>

				{{ __('Create') }}
			</a>

			<a href="{{ route('create-with-vue') }}">
				Create with vue
			</a>
		</x-slot>
		
		<div class="grid gap-5 grid-cols-1 md:grid-cols-4">
			@forelse ($poms as $pom)
				<figure class="relative flex flex-col shadow rounded-md border border-gray-800 overflow-hidden group hover:shadow-md" title="{{ __('Click to learn more.') }}">
					<a href="{{ route('admin.poms-show', $pom->id) }}" class="absolute top-0 left-0 bottom-0 right-0 z-0 inline active:opacity-70"></a>
	
					<img 
						class="h-44 object-center object-cover"
						@if ($pom->images()->exists())
							src="{{ '/storage/images/poms/'.$pom->id.'/'.$pom->avatarImage()}}"
						@else
							src="{{ asset('images/admin/image_placeholder.png') }}"
						@endif
					>
	
					<figcaption class="grid grid-cols-1 gap-y-3 p-5 bg-dark" :class="{'w-full p-0': listViewActive}">
						<div class="flex items-center">
							<h3 class="text-xl text-white leading-none">
								{{ ucfirst($pom->name) }}
	
								@if (!$pom->images()->exists())
									<span class="text-red-400 text-opacity-50 text-sm">
										({{ __('draft') }})
									</span>
								@endif
							</h3>
						</div>
	
						<div class="flex flex-col divide-y divide-gray-700">
							<div class="space-x-1 py-2">
								<span class="text-gray-400 font-light uppercase text-sm">
									{{ __('Age') }}
								</span>
								<span class="text-gray-200">
									{{ ucfirst(__($pom->age)) }}
								</span>
							</div>
	
							<div class="space-x-1 py-2">
								<span class="text-gray-400 font-light uppercase text-sm">
									{{ __('Color') }}
								</span>
								<span class="text-gray-200">
									{{ __(ucfirst($pom->color)) }}
								</span>
							</div>
	
							<div class="space-x-1 py-2">
								<span class="text-gray-400 font-light uppercase text-sm">
									{{ __('Gender') }}
								</span>
								<span class="text-gray-200 inline-flex items-center">
									{{ $pom->is_male === 1 ? __('Male') : __('Female') }}
	
									@if ($pom->is_male)
										<svg class="w-5 h-5 ml-1 fill-current text-blue-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M442 48h-90a22 22 0 0 0 0 44h36.89l-60.39 60.39c-68.19-52.86-167-48-229.54 14.57C31.12 234.81 31.12 345.19 99 413a174.21 174.21 0 0 0 246 0c62.57-62.58 67.43-161.35 14.57-229.54L420 123.11V160a22 22 0 0 0 44 0V70a22 22 0 0 0-22-22zM313.92 381.92a130.13 130.13 0 0 1-183.84 0c-50.69-50.68-50.69-133.16 0-183.84s133.16-50.69 183.84 0s50.69 133.16 0 183.84z"/></svg>
									@else
										<svg class="w-5 h-5 ml-1 fill-current text-red-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C8.691 2 6 4.691 6 8c0 2.967 2.167 5.432 5 5.91V17H8v2h3v2.988h2V19h3v-2h-3v-3.09c2.833-.479 5-2.943 5-5.91c0-3.309-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4s4 1.794 4 4s-1.794 4-4 4z"/></svg>
									@endif
								</span>
								
							</div>
						</div>
	
						<button type="button" class="py-2 px-4 rounded shadow bg-amber text-dark font-medium transition">
							<span>{{ __('Learn more') }}</span>
						</button>
					</figcaption>
				</figure>
			@empty
				<div>
					<p class="text-gray-200">
						{{ __("You have not added any poms yet.") }}
					</p>
				</div>		
			@endforelse
		</div>
	</x-admin.page-layout>
	-->
@endsection