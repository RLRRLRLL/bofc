@extends('layouts.main')

@section('page-title', 'Home')

@section('content')
	<div class="wrapper home">
		<div class="grid">
			<div class="grid__item pos-1">
				<div class="grid__item-img" style="background-image:url('/images/temp/1.jpg');"></div>
			</div>
			<div class="grid__item pos-2">
				<div class="grid__item-img" style="background-image:url('/images/temp/2.jpg');"></div>
			</div>
			<div class="grid__item pos-3">
				<div class="grid__item-img" style="background-image:url('/images/temp/3.jpg');"></div>
			</div>
			<div class="grid__item pos-4">
				<div class="grid__item-img" style="background-image:url('/images/temp/4.jpg');"></div>
			</div>
			<div class="grid__item pos-5">
				<div class="grid__item-img" style="background-image:url('/images/temp/5.jpg');"></div>
			</div>
			<div class="grid__item pos-6">
				<div class="grid__item-img" style="background-image:url('/images/temp/6.jpg');"></div>
			</div>
			<div class="grid__item pos-7">
				<div class="grid__item-img" style="background-image:url('/images/temp/7.jpg');"></div>
			</div>
			<div class="grid__item pos-8">
				<div class="grid__item-img" style="background-image:url('/images/temp/8.jpg');"></div>
			</div>
			<div class="grid__item pos-9">
				<div class="grid__item-img" style="background-image:url('/images/temp/9.jpg');"></div>
			</div>
			<div class="grid__item pos-10">
				<div class="grid__item-img" style="background-image:url('/images/temp/10.jpg');"></div>
			</div>
		</div>
		
		<div class="social_ctas">
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
					<use xlink:href="/sprite.svg#instagram">
					</use>
				</svg>
			</a>
		</div>
		
		
		<section id="header" class="section section-header ai ai__from-bottom">
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

		<section id="about" class="section section-about ai ai__from-bottom">
			<div class="container">
				<div class="section-about__inner section__inner">
					<div class="static">

						<div class="info">
							<h2 class="info-title">
								What we do?
							</h2>

							{{-- <img class="info-cup" src="{{ asset('images/transparent/cup.png') }}" alt="Champion"> --}}

							<div class="info-text">
								<p>
									Добро пожаловать на сайт многопородного питомника РКФ-FCI "ВИКТОРИ'С ФЛЕЙМ"! Мы занимаемся племенной работой с такими замечательными породами собак, как - Померанский шпиц и Ротвейлер.
								</p>
								<p>
									Собаки для нас - это образ жизни. Нашим питомцам уделяется очень много времени. Спортивной дрессировкой и разведением собак мы занимаемся с 1991 года. Породой Померанский шпиц с 2006 года и Ротвейлер с 2017 года.
								</p>
								{{-- <p>
									Производители нашего питомника несут крови ведущих питомников США, Канады, Италии, Германии, России и многих других стран… Основные цели и задачи питомника внести вклад в развитие, а так же поддержание высокой породности наших производителей. Мы прикладываем все силы и знания для достижения этой цели. Большое поголовье собак - это не наш принцип разведения. Ответственность, качественный уход и самое главное это безграничная любовь к питомцам. Мы надеемся, что наши Шпицы и Ротвейлеры не оставят Вас равнодушными.
								</p> --}}
								<p>
									За своих маленьких питомцев, мы выражаем огромную благодарность за доверие, веру в нас и наших собак заводчикам: Калининой Марине Валентиновне, Шеиной Марине, Турбиной Елене и Стрельцовой Яне!
								</p>
							</div>
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
@endpush