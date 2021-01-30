@extends('layouts.main')

@section('page-title', 'Pomeranian')

@section('content')
    <div class="wrapper pomeranian">
		<div class="container">

			<div class="poms">
				@include('includes.main.partials.pomeranian.header')
				@include('includes.main.partials.pomeranian.filter')
				@include('includes.main.partials.pomeranian.catalogue')
			</div>

		</div>
    </div>
@endsection