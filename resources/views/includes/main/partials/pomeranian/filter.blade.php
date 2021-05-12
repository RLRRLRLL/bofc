<div class="filter-wrapper">
	<section class="poms__filter bg-dark-secondary rounded shadow">
		<div class="filter">
			<h2 class="filter__title">
				{{ __('Gender') }}
			</h2>

			<div class="filter__item">
				<div class="radio">
					<input id="all" type="radio" value="all" wire:model="pomGender" checked/>
					<label for="all">{{ __('All') }}</label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="radio">
					<input id="male" type="radio" value="1" wire:model="pomGender"/>
					<label for="male">{{ __('Male') }}</label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="radio">
					<input id="female" type="radio" value="0" wire:model="pomGender"/>
					<label for="female">{{ __('Female') }}</label>
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
					<input id="puppy" type="checkbox" wire:model="pomAges" value="puppy"/>
					<label for="puppy">{{ __('Puppy') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="adult" type="checkbox" wire:model="pomAges" value="adult"/>
					<label for="adult">{{ __('Adult') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="senior" type="checkbox" wire:model="pomAges" value="senior"/>
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
					<input id="for_sale" type="checkbox" checked="checked" wire:model="pomForSale" />
					<label for="for_sale">{{ __('For sale') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="open_for_breeding" type="checkbox" wire:model="pomIsOpen" />
					<label for="open_for_breeding">{{ __('Breeding') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>

			<div class="filter__item">
				<div class="checkbox">
					<input id="has_titles" type="checkbox" wire:model="pomHasTitles" />
					<label for="has_titles">{{ __('Has titles') }}<span class="box"></span></label>
				</div>
				<span class="badge status-primary"></span>
			</div>
		</div>
	</section>
</div>
