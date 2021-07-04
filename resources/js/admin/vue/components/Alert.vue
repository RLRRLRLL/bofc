<template>
	<div
		@props-passed="receiveProps"
		:class="['alert', `alert-${alertData.type}`]"
		ref="alert"
	>
		<div class="alert-icon" v-html="icon[alertData.type]"></div>

		<span class="alert-text">{{ alertData.text }}</span>

		<button class="alert-close" @click="hideAlert">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
				<g fill="currentColor">
					<path
						d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8L4.646 5.354a.5.5 0 0 1 0-.708z"
					/>
				</g>
			</svg>
		</button>
	</div>
</template>

<script>
	export default {
		name: 'Alert',
		props: {
			alertData: Object,
		},
		data() {
			return {
				icon: {
					success: `
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M464 128L240 384l-96-96"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M144 384l-96-96"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 128L232 284"/></svg>
					`,
					error: `
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><g fill="none"><path d="M8 2a6 6 0 1 1 0 12A6 6 0 0 1 8 2zm0 1a5 5 0 1 0 0 10A5 5 0 0 0 8 3zm0 7a.75.75 0 1 1 0 1.5a.75.75 0 0 1 0-1.5zm0-5.5a.5.5 0 0 1 .492.41L8.5 5v3.5a.5.5 0 0 1-.992.09L7.5 8.5V5a.5.5 0 0 1 .5-.5z" fill="currentColor"/></g></svg>
					`,
					info: `
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.5 4A1.5 1.5 0 0 0 12 5.5A1.5 1.5 0 0 0 13.5 7A1.5 1.5 0 0 0 15 5.5A1.5 1.5 0 0 0 13.5 4m-.36 4.77c-1.19.1-4.44 2.69-4.44 2.69c-.2.15-.14.14.02.42c.16.27.14.29.33.16c.2-.13.53-.34 1.08-.68c2.12-1.36.34 1.78-.57 7.07c-.36 2.62 2 1.27 2.61.87c.6-.39 2.21-1.5 2.37-1.61c.22-.15.06-.27-.11-.52c-.12-.17-.24-.05-.24-.05c-.65.43-1.84 1.33-2 .76c-.19-.57 1.03-4.48 1.7-7.17c.11-.64.41-2.04-.75-1.94z" fill="currentColor"/></svg>
					`,
					warning: `
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024"><path d="M464 720a48 48 0 1 0 96 0a48 48 0 1 0-96 0zm16-304v184c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V416c0-4.4-3.6-8-8-8h-48c-4.4 0-8 3.6-8 8zm475.7 440l-416-720c-6.2-10.7-16.9-16-27.7-16s-21.6 5.3-27.7 16l-416 720C56 877.4 71.4 904 96 904h832c24.6 0 40-26.6 27.7-48zm-783.5-27.9L512 239.9l339.8 588.2H172.2z" fill="currentColor"/></svg>
					`,
				},
			}
		},
		methods: {
			hideAlert() {
				this.$refs.alert.classList.add('hide')

				setTimeout(() => {
					this.$emit('remove')
				}, 300)
			},
		},
	}
</script>
