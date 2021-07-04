<template>
	<div>
		<div class="alert-container">
			<Alert
				v-for="(alert, idx) in alertsCount"
				:key="idx"
				:alertData="alertData"
			/>
		</div>

		<!-- Temproray alert test -->
		<button
			type="button"
			class="btn btn-cta"
			@click="showAlert('success', 'Hey there')"
		>
			Show Alert
		</button>
	</div>
</template>

<script>
	// import { shallowRef } from 'vue'
	import Alert from './Alert.vue'

	export default {
		name: 'AlertContainer',
		components: {
			Alert,
		},
		data() {
			return {
				counter: 0,
				alertsCount: 0,
				alertData: {
					type: 'success',
					text: 'I am a success alert',
				},
			}
		},
		methods: {
			showAlert(type, text) {
				if (this.counter % 2) {
					this.alertData.type = 'warning'
				} else {
					this.alertData.type = type
				}
				this.alertData.text = text

				this.alertsCount++
				this.counter++
			},
		},
	}
</script>
