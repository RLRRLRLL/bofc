@extends('layouts.main')

@section('page-title', 'Home')

@section('content')
	<div class="wrapper home">
		@include('includes.main.partials.grid')
		@include('includes.common.special-svgs')
		
		{{-- <div class="social_ctas">
			<a class="social_ctas__item fb" href="https://facebook.com">
				Find us on Facebook 
				<svg class="social_ctas__item--svg">
					<use xlink:href="/sprite.svg#fb">
					</use>
				</svg>
			</a>

			<a class="social_ctas__item inst" href="https://instagram.com">
				or Instagram
				<svg class="social_ctas__item--svg">
					<use xlink:href="#inst">

					</use>
				</svg>
			</a>
		</div> --}}
		
		
		<section id="header" class="section section-header" data-animation="slideInUp" data-animation-delay="500ms">
			<div class="container">
				<div class="section-header__inner section__inner">
					@include('includes.main.partials.brand')

					{{-- <div class="atmosphere">
						<div class="surface"></div>
					</div> --}}

					<div class="stripes" data-target="#about">
						<p class="stripes__text">
							[ about us ]
						</p>
						<div class="arrow"></div>
					</div>
				</div>
			</div>
		</section>

		<section id="about" class="section section-about" data-animation="slideInUp">
			<div class="container">
				<div class="section-about__inner section__inner">
					<div class="static">

						<div class="info">
							<h1 class="info-title">
								What we do?
							</h1>

							{{-- <img class="info-cup" src="{{ asset('images/transparent/cup.png') }}" alt="Champion"> --}}

							<div class="info-text">
								<p>
									Добро пожаловать на сайт многопородного питомника РКФ-FCI "ВИКТОРИ'С ФЛЕЙМ"! Мы занимаемся племенной работой с такими замечательными породами собак, как - Померанский шпиц и Ротвейлер.
								</p>
								<p>
									Собаки для нас - это образ жизни. Нашим питомцам уделяется очень много времени. Спортивной дрессировкой и разведением собак мы занимаемся с 1991 года. Породой Померанский шпиц с 2006 года и Ротвейлер с 2017 года.
								</p>
								<p>
									За своих маленьких питомцев, мы выражаем огромную благодарность за доверие, веру в нас и наших собак заводчикам: Калининой Марине Валентиновне, Шеиной Марине, Турбиной Елене и Стрельцовой Яне!
								</p>
							</div>

							<button class="info-btn" data-target="#header" id="backToTop">
								<div class="arrow"></div>
							</button>
						</div>
					</div>
					
					{{-- <div class="waves">
						<div class="wave wave-one"></div>
						<div class="wave wave-two"></div>
						<div class="wave wave-three"></div>
					</div> --}}
					
				</div>
			</div>
		</section>
	</div>
@endsection

@push('scripts')
	<script>
		//
	</script>
@endpush