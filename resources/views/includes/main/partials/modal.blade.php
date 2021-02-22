<div 
	class="overlay"
	x-ref="overlay"
>
	<div class="modal__bg">
		<figure class="modal">
			<div class="modal__inner" 
				x-on:click.away="if (modalTransitionFinished) {
					$refs.overlay.classList.add('out'); modalTransitionFinished = false;
				}">
				<div class="modal__header">
					<h2 class="modal__header--title">
						Change main info
					</h2>
					<button 
						class="modal__header--close"
						x-on:click="if (modalTransitionFinished) {
							$refs.overlay.classList.add('out'); modalTransitionFinished = false;
						}"
					>
						&times;
					</button>
				</div>

				<div class="modal__body">
					{{-- {{  }} --}}
				</div>

				<div class="modal__footer">
					<button type="button" class="cancel" x-on:click="showModal = false">
						Cancel
					</button>
					<button type="button" class="submit" x-on:click="showModal = false">
						Save
					</button>
				</div>
			</div>
		</figure>
	</div>
</div>