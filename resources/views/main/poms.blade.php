@extends('layouts.main')

@section('page-title', 'All poms')

@section('content')
    <div class="wrapper poms">
        <div id="cursor" class="cursor"></div>
        @include('includes.main.brand')
		@include('includes.main.gallery')
		
		<div id="change-view" class="change-view">
			<h3 class="change-view__title">
				Change view type to single
			</h3>
		</div>
    </div>
@endsection