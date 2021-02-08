<div>
    <form wire:submit.prevent="saveTitles">
		@csrf
		<div>
			<div class="card">
				<div class="card-header">
					<h2>Titles</h2>
				</div>
				<div class="card-body card-body__titles">
					<button type="button">
						Add title
					</button>

					<div class="form-group"></div>
				</div>
			</div>
		</div>

		<button type="submit"
				class="submit-btn submit-btn__info btn btn-success mt-3 w-5">
			Save
			<div wire:loading wire:target="saveTitles">
				@include('includes.common.spinner')
			</div>
			<i wire:loading.class="d-none" wire:target="saveTitles" class="fas fa-check"></i>
		</button>
	</form>
</div>
