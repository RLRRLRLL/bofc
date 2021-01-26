@extends('layouts.main')

@section('page-title', 'Home')

@section('content')
	<div class="wrapper home">
		<section id="header" class="section section-header">
			<div class="container">
				<div class="section-header__inner section__inner">
					@include('includes.main.brand')

					{{-- <div class="atmosphere">
						<div class="surface"></div>
					</div> --}}

					<a class="stripes" href="#about">
						<p class="stripes__text is_fillable" data-text="about">
							about
						</p>
						<div class="arrow"></div>
					</a>
				</div>
			</div>
		</section>

		<section id="about" class="section section-about">
			<div class="container">
				<div class="section-about__inner section__inner">
					<div class="static">
						<nav class="additional-nav">
							<ul>
								<li>
									<a href="#">Home</a>
								</li>
								<li>
									<a href="#">Pomeranians</a>
								</li>
								<li>
									<a href="#">News</a>
								</li>
								<li>
									<a href="#">Contacts</a>
								</li>
								<li>
									<a href="#">Test</a>
								</li>
							</ul>
						</nav>

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
					
					<div class="waves">
						<div class="wave wave-one"></div>
						<div class="wave wave-two"></div>
						<div class="wave wave-three"></div>
					</div>
					
				</div>
			</div>
		</section>
	</div>
@endsection

@push('scripts')
	{{-- <script src="{{asset('js/lib/ss-polyfill.js')}}"></script> --}}
@endpush