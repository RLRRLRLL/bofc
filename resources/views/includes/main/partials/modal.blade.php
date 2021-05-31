<div class="overlay" x-ref="overlay">
	<div class="modal">
		<div class="modal__inner">
			<div class="modal__body">
				<div class="left" x-data="{ marque: false }" x-on:message-sent.window="marque = true" >
					<div class="left__marque" :class="{'go': marque}">
						<h1>
							{{ __('Message received') }}
						</h1>
					</div>
					<livewire:visitor.contact-form/>
				</div>
				<div class="right">
					<!-- Close -->
					<button class="right__close" type="button" title="Close">
						<svg>
							<use xlink:href="/sprite.svg#x_without_border"></use>
						</svg>
					</button>

					<!-- Inner -->
					<div class="right__text">
						<pre>{{ __('We would love to hear from you!') }}</pre>
						<h1>{{ __('Modal Contact Us') }}</h1>
						<p>{{ __('Contact description') }}</p>
					</div>

					<hr class="right__hr">

					<div class="right__contact">
						<div class="right__social">
							<a href="#" class="right__social--item" title="Whatsapp">
								<svg class="right__social--svg wp">
									<use xlink:href="/sprite.svg#wp"></use>
								</svg>
							</a>
							<a href="#" class="right__social--item" title="Facebook">
								<svg class="right__social--svg fb">
									<use xlink:href="/sprite.svg#fb"></use>
								</svg>
							</a>
							<a href="#" class="right__social--item" title="Instagram">
								<svg class="right__social--svg inst">
									<use xlink:href="/sprite.svg#inst"></use>
								</svg>
							</a>
						</div>
						<div class="right__numbers">
							<a href="#">
								<svg><use xlink:href="/sprite.svg#aze"></use></svg>
								+994 55 132 32 99
							</a>
							<a href="#">
								<svg><use xlink:href="/sprite.svg#germany"></use></svg>
								+73 131 85 8559
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>