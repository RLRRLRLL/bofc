<div 
	class="overlay" 
	x-data="{pomID: '', showModal : false}"
	x-init="() => {
		window.livewire.on('pom-created', (pom_id) => {
			pomID = pom_id;
			showModal = true
		})
	}"
	x-show.transition.duration.300ms="showModal"
>
	<figure class="modal" >
		<div class="modal__inner" x-on:click.away="showModal = false">
			<div class="modal__header">
				<p class="modal__header--title">🔥</p>
				<button 
					class="modal__header--close"
					x-on:click="showModal = false"
				>
					&times;
				</button>
			</div>

			<div class="modal__body">
				<p>Отлично! Теперь можно выбрать главное изображение для шпица и опубликовать его.</p>
			</div>

			<div class="modal__footer">
				<a :href="`/admin/pom/${pomID}`">Перейти</a>
			</div>
		</div>
	</figure>
</div>