<template>
	<div class="card">
		<div class="card--header">
			<h1 class="card--header__title" v-text="title"></h1>

			<!-- optional additional header element (mostly link) -->
			<slot name="link"></slot>
		</div>

		<div class="card--content">
			<slot></slot>
		</div>
	</div>
</template>

<script>
	export default {
		name: 'Card',
		props: {
			title: String,
		},
	}
</script>
