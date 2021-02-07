@extends('layouts.admin')

@section('content')
	<div class="main__inner">
		<div class="poms">
			<div class="poms-title">
				<h4>Poms</h4>
			</div>
			<div class="poms-inner">
				<a href="#" class="pom">
					<h6 class="pom-name">
						Pomeranian
					</h6>

					<img src="{{ asset('images/random-dogs/1.jpg') }}" 
						alt="Bubbles of Champain | "
						class="pom-img"
					>

					<button type="button" class="pom-cta">
						Find out more
					</button>
				</a>
			</div>
		</div>
	</div>
@endsection