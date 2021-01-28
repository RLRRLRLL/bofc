@extends('layouts.main')

@section('page-title', 'Pomeranian')

@section('content')
    <div class="wrapper poms">
		<div class="container">
			<div class="poms__inner">
				{{-- <div id="cursor" class="cursor"></div> --}}
				{{-- @include('includes.main.partials.brand') --}}

				@include('includes.main.partials.select')

				@include('includes.main.partials.gallery')
			</div>
		</div>
		
		{{-- <div id="change-view" class="change-view">
			<h3 class="change-view__title">
				Change view type to single
			</h3>
		</div> --}}
    </div>
@endsection