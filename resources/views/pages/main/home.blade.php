@extends('layouts.main')

@section('page-title', 'Home')

@section('content')
	<main class="main home" data-scroll-container>
		@include('includes.common.special-svgs')

		<!-- Brand -->
		<section class="brand" data-scroll-section>
			<div class="container">
				<h1 class="brand__title" data-scroll data-scroll-speed="1">
					{{ config('app.name') }}
				</h1>
	
				<h2 class="brand__desc" data-scroll data-scroll-speed="2">
					The pomeranian spitz breed kennel
				</h2>
			</div>
		</section>

		<!-- Grid -->
		<section class="tiles tiles--rotated" id="grid2" style="margin-top: 100px;" data-scroll-section>
			<div class="tiles__wrap">
				<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/4.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/5.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/6.jpg)"></div>
				</div>
				<div class="tiles__line" data-scroll data-scroll-speed="-1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/8.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/9.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/10.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/11.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/12.jpg)"></div>
				</div>
				<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
					<div class="tiles__line-img" style="background-image:url(/demo1/13.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/14.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/15.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/16.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/17.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/18.jpg)"></div>
				</div>
				<div class="tiles__line" data-scroll data-scroll-speed="-1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
					<div class="tiles__line-img" style="background-image:url(/demo1/19.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/20.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/21.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/22.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/23.jpg)"></div>
					<div class="tiles__line-img"></div>
				</div>
				<div class="tiles__line" data-scroll data-scroll-speed="1" data-scroll-target="#grid2" data-scroll-direction="horizontal">
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/26.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/27.jpg)"></div>
					<div class="tiles__line-img" style="background-image:url(/demo1/28.jpg)"></div>
					<div class="tiles__line-img"></div>
					<div class="tiles__line-img"></div>
				</div>
			</div>
		</section>

		<!-- About -->
		<section id="about" class="section about" data-scroll-section>
			<div class="about__title">
				<h2 data-scroll data-scroll-speed="3" data-scroll-direction="horizontal">About us &prop; About us &prop; About us &prop; About us &prop; About us</h2>
				<h2 data-scroll data-scroll-speed="1" data-scroll-direction="horizontal">What we do &prop; What we do &prop; What we do &prop; What we do</h2>
			</div>
			<div class="container">
				<div class="section__inner about__inner">
					<div class="info fadeInUp anim-item" data-scroll data-scroll-class="anim-stop">
						<div class="info-text">
							<p>
								Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
							</p>
						</div>
					</div>
					<div class="logo anim-item fadeInUp anim-delay" data-scroll data-scroll-class="anim-stop">
						<img src="{{ asset('images/logo-circle.png') }}" class="logo__image">
					</div>
				</div>
			</div>
		</section>

		<!-- Flexin' -->
		<section id="flexin" class="section flexin" data-scroll-section>
			<div class="container">
				<div class="flexin__inner" data-scroll data-scroll-speed="1.5">
					<div class="flexin__item anim-item fadeInUp" data-scroll data-scroll-class="anim-stop">
						<div class="flexin__item--window">
							<svg>
								<use xlink:href="/sprite.svg#certificate"></use>
							</svg>
						</div>
						<div class="flexin__item--desc">
							<p>
								<span>Certified gangsters</span>
								&#8212;
								Our poms are hella certified. Not to mention their "gansta" possibilities.
							</p>
						</div>
					</div>
					<div class="flexin__item anim-item fadeInUp anim-delay" data-scroll data-scroll-class="anim-stop">
						<div class="flexin__item--window">
							<svg>
								<use xlink:href="/sprite.svg#trophey"></use>
							</svg>
						</div>
						<div class="flexin__item--desc">
							<p>
								<span>1 trophey, 2 trophey, finish</span>
								&#8212;
								Tropheys are like cups, but more like tropheys. That's why they could be called trophecups. 
							</p>
						</div>
					</div>
					<div class="flexin__item anim-item fadeInUp anim-delay-medium" data-scroll data-scroll-class="anim-stop">
						<div class="flexin__item--window">
							<svg>
								<use xlink:href="/sprite.svg#care"></use>
							</svg>
						</div>
						<div class="flexin__item--desc">
							<p>
								<span>Sharing is not caring</span>
								&#8212;
								That's right. Our poms are beloved and cared, and so much more.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Reach us out -->
		<section id="reach-us" class="section reach-us" data-scroll-section>
			<div class="container">
				<div class="reach-us__inner">
					<div class="reach-us__col">
						<h1 class="reach-us__text anim-item fadeInUp" data-scroll data-scroll-class="anim-stop">Got questions?</h1>
						<h1 class="reach-us__text reach-us__text--bigger anim-item fadeInUp anim-delay" data-scroll data-scroll-class="anim-stop">Reach us out!</h1>
					</div>
					<div class="reach-us__col anim-item fadeInUp" data-scroll data-scroll-class="anim-stop">
						<button class="reach-us__btn btn-bestia contact-modal-trigger" type="button">
							<div class="btn-bestia__bg"></div>
							<span class="btn-bestia__text">Contact us</span>
						</button>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection

@push('scripts')
	<script>
		//
	</script>
@endpush