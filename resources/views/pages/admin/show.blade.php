@extends('layouts.admin')

@section('content')
	<div class="single">
		<div class="single__left">
			<h1 class="single__left--name">
				{{ $pom->name }}

				<svg class="gender-svgs">
					<use 
						xlink:href="/sprite.svg#{{ ($pom->gender == 'male') ? 'male' : 'fem' }}"
					>
					</use>
				</svg>
			</h1>

			<div class="single__left--info">
				<h3>Информация о собаке:</h3>
				
				<ul>
					<li>Color: <span>{{ $pom->color }}</span></li>
					<li>Color: <span>{{ $pom->color }}</span></li>
					<li>Color: <span>{{ $pom->color }}</span></li>
				</ul>
			</div>
			
		</div>

		<div class="single__right">
			<img src="{{ asset('images/random-dogs/1.jpg') }}">
			<img src="{{ asset('images/random-dogs/2.jpg') }}">
		</div>
	</div>
@endsection