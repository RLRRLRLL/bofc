{{-- 
	error types: ['success', 'warning', 'info', 'danger'] 
--}}

<div
	x-data="alertbox()"
	x-on:show-alert.window="showAlert(
		$event.detail.type,
		$event.detail.message,
		$event.detail.persistent
	)"
	x-init="$watch('openAlertBox', value => {
		if (value) setTimeout(() => openAlertBox = false, isPersistent ? 10000 : 3000)
	})"
>
    <template x-if="openAlertBox">
		<div
			class="w-full fixed bottom-0 right-0 flex justify-end"
			x-transition:enter="transition ease-out duration-300"
			x-transition:enter-start="opacity-0"
			x-transition:enter-end="opacity-100"
			x-transition:leave="transition ease-in duration-300"
			x-transition:leave-start="opacity-100"
			x-transition:leave-end="opacity-0"
		>
			<div class="p-10 md:max-w-md lg:max-w-lg xl:max-w-xl">
				<div class="relative flex items-center p-4 pr-10 rounded-lg shadow-lg font-medium overflow-hidden" :class="alertBackgroundColor" role="alert">
					{{-- border on the edge --}}
					<div class="absolute left-0 top-0 bottom-0 block h-full w-1" :class="alertBorderColor"></div>
					
					<div class="flex pl-3">
						<span x-html="alertIcon"></span>
						<span x-text="alertMessage" :class="alertMessageColor"></span>
					</div>

					<template x-if="isPersistent">
						<button type="button" class="absolute top-3 right-3 group opacity-90" x-on:click="openAlertBox = false">
							<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:opacity-100" :class="alertMessageColor" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
							</svg>
						</button>
					</template>
				</div>
			</div>
		</div>
	</template>

	<script defer>
		window.alertbox = function() {
			return {
				openAlertBox: false,
				isPersistent: false,
				alertBackgroundColor: '',
				alertMessageColor: '',
				alertBorderColor: '',
				alertMessage: '',
				alertIcon: '',
				showAlert(type, message, persistent = false) {
					this.alertMessage = message;
					this.isPersistent = persistent;
					this.openAlertBox = true;

					switch (type) {
						case 'success':
							this.alertBackgroundColor = 'bg-green-200'
							this.alertMessageColor = 'text-green-700'
							this.alertBorderColor = 'bg-green-700'
							this.alertIcon = this.successIcon
								break

						case 'info':
							this.alertBackgroundColor = 'bg-blue-200'
							this.alertMessageColor = 'text-blue-700'
							this.alertBorderColor = 'bg-blue-700'
							this.alertIcon = this.infoIcon
								break

						case 'warning':
							this.alertBackgroundColor = 'bg-yellow-200'
							this.alertMessageColor = 'text-yellow-700'
							this.alertBorderColor = 'bg-yellow-700'
							this.alertIcon = this.warningIcon
								break

						case 'danger':
							this.alertBackgroundColor = 'bg-red-200'
							this.alertMessageColor = 'text-red-700'
							this.alertBorderColor = 'bg-red-700'
							this.alertIcon = this.dangerIcon
								break
					}
				},

				successIcon: `<svg viewBox="0 0 24 24" class="text-green-600 mt-px w-5 h-5 sm:w-5 sm:h-5 mr-4"><path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z"></path></svg>`,

				infoIcon: `<svg viewBox="0 0 24 24" class="text-blue-600 mt-px w-5 h-5 sm:w-5 sm:h-5 mr-4"><path fill="currentColor" d="M12,0A12,12,0,1,0,24,12,12.013,12.013,0,0,0,12,0Zm.25,5a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,12.25,5ZM14.5,18.5h-4a1,1,0,0,1,0-2h.75a.25.25,0,0,0,.25-.25v-4.5a.25.25,0,0,0-.25-.25H10.5a1,1,0,0,1,0-2h1a2,2,0,0,1,2,2v4.75a.25.25,0,0,0,.25.25h.75a1,1,0,1,1,0,2Z"></path></svg>`,

				warningIcon: `<svg viewBox="0 0 24 24" class="text-yellow-600 mt-px w-5 h-5 sm:w-5 sm:h-5 mr-4"><path fill="currentColor" d="M23.119,20,13.772,2.15h0a2,2,0,0,0-3.543,0L.881,20a2,2,0,0,0,1.772,2.928H21.347A2,2,0,0,0,23.119,20ZM11,8.423a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Zm1.05,11.51h-.028a1.528,1.528,0,0,1-1.522-1.47,1.476,1.476,0,0,1,1.448-1.53h.028A1.527,1.527,0,0,1,13.5,18.4,1.475,1.475,0,0,1,12.05,19.933Z"></path></svg>`,

				dangerIcon: `<svg viewBox="0 0 24 24" class="text-red-600 mt-px w-5 h-5 sm:w-5 sm:h-5 mr-4"><path fill="currentColor" d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z"></path></svg>`,
			}
		}
	</script>
</div>