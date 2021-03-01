<div class="filter-wrapper">
	<section class="poms__filter anim-item fadeInUp anim-delay-medium" data-scroll data-scroll-class="anim-stop">
		<h3 class="poms__filter--title">
			{{ __('Filters') }}
		</h3>

		<div class="filter">
			<h2 class="filter__title">
				{{ __('Gender') }}
			</h2>

			<div class="filter__item">
				<div class="checkbox">
					<input id="all" type="checkbox" checked/>
					<label for="all">{{ __('All') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="male" type="checkbox" />
					<label for="male">{{ __('Male') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="female" type="checkbox" />
					<label for="female">{{ __('Female') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>
		</div>

		<div class="filter">
			<h2 class="filter__title">
				{{ __('Age') }}
			</h2>

			<div class="filter__item">
				<div class="checkbox">
					<input id="all" type="checkbox" checked/>
					<label for="all">{{ __('All') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="puppy" type="checkbox" />
					<label for="puppy">{{ __('Puppy') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="adult" type="checkbox" />
					<label for="adult">{{ __('Adult') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="senior" type="checkbox" />
					<label for="senior">{{ __('Senior') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>
		</div>

		<div class="filter">
			<h2 class="filter__title">
				{{ __('Other') }}
			</h2>

			<div class="filter__item">
				<div class="checkbox">
					<input id="for_sale" type="checkbox" checked="checked" />
					<label for="for_sale">{{ __('For sale') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="open_for_breeding" type="checkbox" />
					<label for="open_for_breeding">{{ __('Open for breeding') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="has_titles" type="checkbox" />
					<label for="has_titles">{{ __('Has titles') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>
		</div>
	</section>
</div>
