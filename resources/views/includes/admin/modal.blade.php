<div 
	class="overlay"
	x-show.transition.duration.300ms="showModal"
>
	<figure class="modal" >
		<div class="modal__inner" x-on:click.away="showModal = false">
			<div class="modal__header">
				<h2 class="modal__header--title">
					Change main info
				</h2>
				<button 
					class="modal__header--close"
					x-on:click="showModal = false"
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