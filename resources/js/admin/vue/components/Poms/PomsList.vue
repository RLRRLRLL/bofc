<template>
	<Card title="All poms">
		<template v-slot:link>
			<a href="/12a5155wo298d1u3d1j0/create-with-vue">
				Create

				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
				</svg>
			</a>
		</template>
	</Card>
</template>

<script>
	import Card from './../../layouts/Card.vue'

	export default {
		name: 'PomsList',
		components: {
			Card,
		},
		props: {
			poms: Array,
		},
	}
</script>

<style lang="scss" scoped></style>
