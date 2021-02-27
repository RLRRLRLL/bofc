import { query, queryAll } from './../Utils'

let modalTransitionFinished = false
const modalTriggers = queryAll('.contact-modal-trigger')
const modalOverlay = query('.overlay')
const modal = query('.modal__inner')
const closeModalBtn = query('.right__close')

function closeModal() {
	if (modalTransitionFinished) {
		modalOverlay.classList.add('out')
	}
}

function triggerModal() {
	modalTriggers.forEach((btn) => {
		btn.addEventListener('click', () => {
			modalOverlay.classList.remove('out')
			modalOverlay.classList.add('split')
			setTimeout(() => {
				modalTransitionFinished = true
			}, 350) // animation duration
		})
	})

	modalOverlay.addEventListener('click', (e) => {
		const withinModal = e.composedPath().includes(modal)

		!withinModal && closeModal()
	})

	closeModalBtn.addEventListener('click', () => {
		closeModal()
	})
}

export { triggerModal }
